(function ($, _) {
    "use strict";

    var baseUrl = location.origin;
    var format = '?_format=json';
    var employeeQuestionaries = {};
    var teamleadQuestionaries = {};
    var allQuestionaries = {};
    var resultQuestionaries = {};
    var employeeResponseText;
    var teamleadResponseText;
    var allResponseText;
    var readyTable;
    var workTabContainer;
    var timeQuestionarePeriod = 10800;//'15811200';

    var employeeQueryUrl = '/rest/views/employee-questionnairies';
    var teamleadQueryUrl = '/rest/views/teamlead-questionnairies';
    var allQueryUrl = '/rest/views/all-questionnairies';

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
            newTableHeadCell.innerHTML = '';
            newTableRow.insertBefore(newTableHeadCell, newTableRow.firstChild);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = '';
            newTableRow.insertBefore(newTableHeadCell,null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = '';
            newTableRow.insertBefore(newTableHeadCell,null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = 'Сотрудник';
            newTableRow.insertBefore(newTableHeadCell, null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = 'Дата создания';
            newTableRow.insertBefore(newTableHeadCell, null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = 'Дата изменения';
            newTableRow.insertBefore(newTableHeadCell,null);

            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = '';
            newTableRow.insertBefore(newTableHeadCell,null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = '';
            newTableRow.insertBefore(newTableHeadCell,null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = '';
            newTableRow.insertBefore(newTableHeadCell,null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = 'Тимлид';
            newTableRow.insertBefore(newTableHeadCell,null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = 'Дата изменения';
            newTableRow.insertBefore(newTableHeadCell,null);
            var newTableHeadCell = document.createElement('th');
            newTableHeadCell.innerHTML = 'Дата создания';
            newTableRow.insertBefore(newTableHeadCell, null);

            var newTableCell = document.createElement('td');

            newTable.classList.add('table-striped', 'table', 'table-hover');
            // newTableRow.insertBefore(newTableCell,newTableRow.firstChild);
            // newTableRow.insertBefore(newTableHeadCell,newTableRow.firstChild);
            newTableHead.insertBefore(newTableRow, newTableHead.firstChild);
            newTable.insertBefore(newTableHead, newTable.firstChild);
            newTable.insertBefore(newTableBody, newTable.null);

            // alert(employeeQuestionaries);

            for (var allQuestionareKey in allQuestionaries) {
                findObjQuestionnare(allQuestionaries[allQuestionareKey].sid, allQuestionaries[allQuestionareKey].webform_id);
                console.log('resultQuestionaries: ');
                console.log(resultQuestionaries);
                
            }

            for (var employeeQuestionnareKey in employeeQuestionaries) {
                var teamleadSearched = searchTeamleadQuestionnare(employeeQuestionaries[employeeQuestionnareKey].author_id, employeeQuestionaries[employeeQuestionnareKey].created_sec);
                var questionnarTableRow = document.createElement('tr');

                newTableBody.insertBefore(questionnarTableRow,null);

                for (var employeeFieldKey in employeeQuestionaries[employeeQuestionnareKey]) {
                    var employeeTableCell = document.createElement('td');

                    // questionnarTableRow.insertBefore(employeeTableCell,null);

                    switch (employeeFieldKey){
                        case 'teamlead_id': break;
                        case 'created_sec': break;
                        case 'author_id': break;
                        default:  employeeTableCell.innerHTML = employeeQuestionaries[employeeQuestionnareKey][employeeFieldKey];
                        questionnarTableRow.insertBefore(employeeTableCell,null);
                    }
                }

                for (var teamleadSearchedKey in teamleadSearched) {
                    var teamleadSearchedTableCell = document.createElement('td');

                    questionnarTableRow.insertBefore(teamleadSearchedTableCell,null);

                    switch (teamleadSearchedKey){
                        case 'created_sec': break;
                        case 'author_id': break;
                        case 'employee_id': break;
                        case 'locked': break;
                        default:  teamleadSearchedTableCell.innerHTML = teamleadSearched[teamleadSearchedKey];
                        questionnarTableRow.insertBefore(employeeTableCell,null);
                    }
                }
                // console.log(teamleadSearched);
            }
        }

        return newTable;
    }

    // search for a dependent questionnare of teamlead
    function searchTeamleadQuestionnare(employeeId, employeeDateCreated) {
        
        for (var teamleadQuestionareKey in teamleadQuestionaries) {
                var timeDifference = Math.abs(teamleadQuestionaries[teamleadQuestionareKey].created_sec - employeeDateCreated);
                
                if (employeeId === teamleadQuestionaries[teamleadQuestionareKey].employee_id && timeDifference <= timeQuestionarePeriod) {
                    return teamleadQuestionaries[teamleadQuestionareKey];
                    break;
                } else {
                    // console.log(teamleadQuestionaries[teamleadQuestionareKey]);
                }
        }

    }


    // finds and returns a consolidated questionnaire.
    function findObjQuestionnare(questionnareId, formType) {
        if (formType === 'self_worth') {
            for (employeeQuestionareKey in employeeQuestionaries) {
                resultQuestionaries.employeeQuestionareKey = employeeQuestionaries[employeeQuestionareKey];
                console.log(employeeQuestionaries[employeeQuestionareKey]);
                
            }
        } else if (formType === 'anketa_ocenki') {
        
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

                if (~requestUrl.indexOf(allQueryUrl)) {
                    allResponseText = xhr.responseText;
                    if(allQuestionaries) {
                        try {
                            teamleadQuestionaries = JSON.parse(allResponseText);
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
    sendAjaxRequest(baseUrl + allQueryUrl + format);


    
    // function ready() {
    //     // workTabContainer = document.getElementsByClassName('manage-questionnairies')[0];
    //     var tool = document.getElementById('block-webform');
    //     console.log(tool);
       
    //     alert( 'DOM готов' );
    // }
    

    // document.addEventListener("DOMContentLoaded", ready);

})(window.jQuery, window._);