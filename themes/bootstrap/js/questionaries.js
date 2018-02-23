(function ($, _) {
    "use strict";

    var baseUrl = location.origin;
    var format = '?_format=json';
    var employeeQuestionaries = {};
    var teamleadQuestionaries = {};
    var resultQuestionaries = {};
    var employeeResponseText;
    var teamleadResponseText;
    var readyTable;
    var workTabContainer;
    var timeQuestionarePeriod = 10800;//'15811200';

    var employeeQueryUrl = '/rest/views/employee-questionnairies';
    var teamleadQueryUrl = '/rest/views/teamlead-questionnairies';

    function createTable() {
        // var fullTable;

        console.log('employeeQuestionaries');
        console.log(employeeQuestionaries);

        console.log('teamleadQuestionaries');
        console.log(teamleadQuestionaries);

        if (Object.keys(employeeQuestionaries).length > 0 && Object.keys(teamleadQuestionaries).length > 0) {
        
            var newTable = document.createElement('table');
            var newTableHead = document.createElement('thead');
            var newTableBody = document.createElement('tbody');
            var newTableRow = document.createElement('tr');
            var newTableHeadCell = document.createElement('th');
            var newTableCell = document.createElement('td');

            newTable.classList.add('table-striped');
            newTableHeadCell.innerHTML = 'Новая таблица';
            // newTableRow.insertBefore(newTableCell,newTableRow.firstChild);
            newTableRow.insertBefore(newTableHeadCell,newTableRow.firstChild);
            newTableHead.insertBefore(newTableRow, newTableHead.firstChild);
            newTable.insertBefore(newTableHead, newTable.firstChild);
            newTable.insertBefore(newTableBody, newTable.null);

            // alert(employeeQuestionaries);

            for (var employeeQuestionnareKey in employeeQuestionaries) {
                resultQuestionaries.number = +employeeQuestionnareKey + 1;

                for (var employeeFieldKey in employeeQuestionaries[employeeQuestionnareKey]) {

                    resultQuestionaries[employeeFieldKey] = employeeQuestionaries[employeeQuestionnareKey][employeeFieldKey];
                    // if (employeeQuestionaries[employeeQuestionnareKey].teamlead === employeeQuestionaries[employeeQuestionnareKey].author) {
                    //     for (var teamleadQuestionareKey in teamleadQuestionaries) {
                    //         for (var employeeFieldKey in employeeQuestionaries[employeeQuestionnareKey]) {
                    //             resultQuestionaries[employeeFieldKey] = employeeQuestionaries[employeeQuestionnareKey][employeeFieldKey];
                    //         }
                    //     }
                    // }

                }
                var teamQ = searchRowObj(employeeQuestionaries[employeeQuestionnareKey].author_id, employeeQuestionaries[employeeQuestionnareKey].created_sec);
                console.log(teamQ);
            }



            for (var employeeQuestionnareKey in employeeQuestionaries) {

                var employeeTableRow = document.createElement('tr');

                newTableBody.insertBefore(employeeTableRow,null);

                for (var employeeFieldKey in employeeQuestionaries[employeeQuestionnareKey]) {
                    var employeeTableCell = document.createElement('td');

                    employeeTableRow.insertBefore(employeeTableCell,null);

                    switch (employeeFieldKey){
                        default:  employeeTableCell.innerHTML = employeeQuestionaries[employeeQuestionnareKey][employeeFieldKey];
                    }
                }
            }
        }

        return newTable;
    }

    function searchRowObj(employeeId, employeeDateCreated) {
        // console.log('employeeId: ' + employeeId);
        // console.log('employeeDateCreated: ' + employeeDateCreated);
        
        for (var teamleadQuestionareKey in teamleadQuestionaries) {
            // for (var teamleadFieldKey in teamleadQuestionaries[teamleadQuestionareKey]) {
                var timeDifference = Math.abs(teamleadQuestionaries[teamleadQuestionareKey].created_sec - employeeDateCreated);
                
                if (employeeId === teamleadQuestionaries[teamleadQuestionareKey].employee_id && timeDifference <= timeQuestionarePeriod) {
                    // console.log('THIS IS KEY FOR OBJECT: ' + teamleadQuestionareKey);
                    // console.log(teamleadQuestionaries[teamleadQuestionareKey]);
                    
                    return teamleadQuestionaries[teamleadQuestionareKey];
                    break;
                } else {
                    console.log(employeeDateCreated);
                    
                }
            // }
        }

    }

    function renderTable() {
        readyTable = createTable();
        workTabContainer = document.getElementsByClassName('manage-questionnairies')[0];

        // console.log('readyTable');
        // console.log(readyTable);
        window.onload = function() {
        //     console.log('workTabContainer');
        //     console.log(workTabContainer);


            // if (readyTable === undefined) {
            //     readyTable = createTable();
            //     console.log('double TABLE');
            //     console.log(readyTable);
                
            // }
        // console.log('Object.keys(readyTable).length: ' + Object.keys(readyTable).length);
        // console.log('Object.keys(workTabContainer).length: ' + Object.keys(workTabContainer).length);
            if (Object.keys(workTabContainer).length > 0 && readyTable !== undefined) {
                workTabContainer.appendChild(readyTable);
            }
        }
    }

    function sendAjaxRequest(requestUrl) {
        var xhr = new XMLHttpRequest();

        xhr.open('GET', requestUrl, true);
    
        xhr.onreadystatechange = function() {
            if (this.readyState != 4) return;
    
            if (xhr.status != 200) {
                alert( xhr.status + ': ' + xhr.statusText );
                // return xhr.status + ': ' + xhr.statusText;
            } else {
                // alert(xhr.responseText);
                if (~requestUrl.indexOf(employeeQueryUrl)) {
                    employeeResponseText = xhr.responseText;
                    if(employeeResponseText) {
                        try {
                            employeeQuestionaries = JSON.parse(employeeResponseText);
                        } catch(e) {
                            alert(e); // error in the above string (in this case, yes)!
                        }
                    }
                }

                if (~requestUrl.indexOf(teamleadQueryUrl)) {
                    teamleadResponseText = xhr.responseText;
                    if(teamleadResponseText) {
                        try {
                            teamleadQuestionaries = JSON.parse(teamleadResponseText);
                        } catch(e) {
                            alert(e); // error in the above string (in this case, yes)!
                        }
                    }
                }
                renderTable();
            }
        }
    
        xhr.send();
    }

    sendAjaxRequest(baseUrl + employeeQueryUrl + format);
    sendAjaxRequest(baseUrl + teamleadQueryUrl + format);


    
    // function ready() {
    //     // workTabContainer = document.getElementsByClassName('manage-questionnairies')[0];
    //     var tool = document.getElementById('block-webform');
    //     console.log(tool);
       
    //     alert( 'DOM готов' );
    // }
    

    // document.addEventListener("DOMContentLoaded", ready);

})(window.jQuery, window._);