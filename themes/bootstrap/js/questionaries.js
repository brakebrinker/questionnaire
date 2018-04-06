(function ($, _) {

    "use strict";

    var baseUrl = location.origin;
    var format = '?_format=json';
    var employeeQuestionaries = [];
    var teamleadQuestionaries = [];
    var allQuestionaries = [];
    var excludedSidQuestionaries = [];
    var resultQuestionaries = {};
    var readyTable;
    var workTabContainer;
    var timeQuestionarePeriod = 10800;//'15811200'; //sec
    var requestUrls = [
        '/rest/views/employee-questionnairies',
        '/rest/views/teamlead-questionnairies',
        '/rest/views/all-questionnairies'
    ];

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
                var questionnarTableRow = document.createElement('tr');
                var resultQuestionaries = findObjQuestionnare(allQuestionaries[allQuestionareKey].sid, allQuestionaries[allQuestionareKey].webform_id);

                newTableBody.insertBefore(questionnarTableRow,null);

                for (var resultQuestionareKey in resultQuestionaries) {
                    var resultTableCell = document.createElement('td');

                    switch (resultQuestionareKey){
                        case 'sid': break;
                        case 'team_sid': break;
                        case 'teamlead_id': break;
                        case 'created_sec': break;
                        case 'author_id': break;
                        case 'team_author_id': break;
                        case 'team_created_sec': break;
                        case 'team_employee_id': break;
                        case 'team_locked': break;
                        default:  resultTableCell.innerHTML = resultQuestionaries[resultQuestionareKey];
                        questionnarTableRow.insertBefore(resultTableCell,null);
                    }
                }
            }
            console.log('resultQuestionaries After create table');
            console.log(resultQuestionaries);
        }

        renderTable(newTable);
    }

    // search for a dependent questionnare of teamlead
    function searchTeamleadQuestionnare(employeeId, employeeDateCreated) {

        for (var teamleadQuestionareKey in teamleadQuestionaries) {
                var timeDifference = Math.abs(teamleadQuestionaries[teamleadQuestionareKey].team_created_sec - employeeDateCreated);
                var issetTeamleadSid = ~excludedSidQuestionaries.indexOf(teamleadQuestionaries[teamleadQuestionareKey].team_sid);

                if (employeeId === teamleadQuestionaries[teamleadQuestionareKey].team_employee_id && timeDifference <= timeQuestionarePeriod && !issetTeamleadSid) {

                    excludedSidQuestionaries.push(teamleadQuestionaries[teamleadQuestionareKey].team_sid);

                    return teamleadQuestionaries[teamleadQuestionareKey];
                    // break;
                } else {
                    // console.log(teamleadQuestionaries[teamleadQuestionareKey]);
                    return {};
                    // break;
                }
        }

    }

    // search for a dependent questionnare of employee
    function searchEmployeeQuestionnare(teamEmployeeId, teamleadDateCreated, teamleadSid) {
        console.log('teamleadSid: ' + teamleadSid);
        for (var employeeQuestionareKey in employeeQuestionaries) {
            var timeDifference = Math.abs(employeeQuestionaries[employeeQuestionareKey].created_sec - teamleadDateCreated);

            if (teamEmployeeId === employeeQuestionaries[employeeQuestionareKey].author_id && timeDifference <= timeQuestionarePeriod) {

                // && !~excludedSidQuestionaries.indexOf(teamleadSid)
                return employeeQuestionaries[employeeQuestionareKey];
                // break;
            } else {
                // console.log(teamleadQuestionaries[teamleadQuestionareKey]);
                return {};
                // break;
            }
        }

    }

    // finds and returns a consolidated questionnaire.
    function findObjQuestionnare(questionnareId, formType) {
        var resultQuestionaries = {};

        if (formType === 'self_worth') {
            for (var employeeQuestionareKey in employeeQuestionaries) {
                if (employeeQuestionaries[employeeQuestionareKey].sid === questionnareId) {
                    var teamleadSearched = searchTeamleadQuestionnare(employeeQuestionaries[employeeQuestionareKey].author_id, employeeQuestionaries[employeeQuestionareKey].created_sec);

                    for (var employeeFieldKey in employeeQuestionaries[employeeQuestionareKey]) {
                        employeeQuestionaries[employeeQuestionareKey];
                        resultQuestionaries[employeeFieldKey] = employeeQuestionaries[employeeQuestionareKey][employeeFieldKey];
                    }

                    if (Object.keys(teamleadSearched).length > 0) {
                        for (var teamleadSearchedKey in teamleadSearched) {
                            resultQuestionaries[teamleadSearchedKey] = teamleadSearched[teamleadSearchedKey];
                        }
                    } else {
                        resultQuestionaries = createEmptyTeamleadFields(resultQuestionaries);
                    }

                    console.log('result self_w: ');
                    console.log(resultQuestionaries);
                }
            }

            return resultQuestionaries;

        } else if (formType === 'anketa_ocenki') {
            for (var teamleadQuestionareKey in teamleadQuestionaries) {
                var issetTeamleadSid = ~excludedSidQuestionaries.indexOf(teamleadQuestionaries[teamleadQuestionareKey].team_sid);

                if (teamleadQuestionaries[teamleadQuestionareKey].team_sid === questionnareId && !issetTeamleadSid) {
                    // var employeeSearched = searchEmployeeQuestionnare(teamleadQuestionaries[teamleadQuestionareKey].team_employee_id, teamleadQuestionaries[teamleadQuestionareKey].team_created_sec, teamleadQuestionaries[teamleadQuestionareKey].team_sid);

                    resultQuestionaries = createEmptyEmployeeFields(resultQuestionaries);

                    for (var teamleadFieldKey in teamleadQuestionaries[teamleadQuestionareKey]) {
                        resultQuestionaries[teamleadFieldKey] = teamleadQuestionaries[teamleadQuestionareKey][teamleadFieldKey];
                    }

                    console.log('result ank_ocenki: ');
                    console.log(resultQuestionaries);
                }
            }
            return resultQuestionaries;
        }

    }

    function renderTable(createdTable) {
        // readyTable = createTable();
        workTabContainer = document.getElementsByClassName('manage-questionnairies')[0];
        excludedSidQuestionaries = [];

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
            if (Object.keys(workTabContainer).length > 0 && createdTable !== undefined) {
                workTabContainer.appendChild(createdTable);
            } else {
                alert('Class name: manage-questionnairies not found.');
            }
        }
    }

    // create empty fields for emloyee obj
    function createEmptyEmployeeFields(resultQuestionaries) {

        for (var employeeQuestionareKey in employeeQuestionaries) {
            for (var employeeFieldKey in employeeQuestionaries[employeeQuestionareKey]) {
                resultQuestionaries[employeeFieldKey] = '';
            }
        }
        return resultQuestionaries;
    }

    // create empty fields for teamlead obj
    function createEmptyTeamleadFields(resultQuestionaries) {

        for (var teamleadQuestionareKey in teamleadQuestionaries) {
            for (var teamleadFieldKey in teamleadQuestionaries[teamleadQuestionareKey]) {
                resultQuestionaries[teamleadFieldKey] = '';
            }
        }
        return resultQuestionaries;
    }

    //check the readiness of objects
    function checkObjectsFromRequests(responseText, requestUrl) {
        // console.log('responseText: ' + responseText);
        if (requestUrl === requestUrls[0]) {
            employeeQuestionaries = JSON.parse(responseText);
        }

        if (requestUrl === requestUrls[1]) {
            teamleadQuestionaries = JSON.parse(responseText);
        }

        if (requestUrl === requestUrls[2]) {
            allQuestionaries = JSON.parse(responseText);
        }

        if (Object.keys(employeeQuestionaries).length > 0 && Object.keys(teamleadQuestionaries).length > 0 && Object.keys(allQuestionaries).length > 0) {
            createTable();
        }
    }

    //prepare sending ajax requests
    function prepareSendingAjaxRequests(requestArr) {
        for(var requestCount = 0; requestCount < requestArr.length; requestCount++) {
            sendAjaxRequest(requestUrls[requestCount]);
        }
    }

    // sending ajax requests
    function sendAjaxRequest(requestUrl) {

        var xhr = new XMLHttpRequest();
        var responseText;
        var requestTargetUrl = baseUrl + requestUrl + format;

        xhr.open('GET', requestTargetUrl, true);

        xhr.onreadystatechange = function() {
            if (this.readyState != 4) return;

            if (xhr.status != 200) {
                alert( xhr.status + ': ' + xhr.statusText );
            } else {
                responseText = xhr.responseText;
                if(responseText) {
                    try {
                        checkObjectsFromRequests(responseText, requestUrl);
                    } catch(e) {
                        sendAjaxRequest(requestUrl);
                        alert(e);
                    }
                }
            }
        }

        xhr.send();
    }

    prepareSendingAjaxRequests(requestUrls);

    // function ready() {
    //     // workTabContainer = document.getElementsByClassName('manage-questionnairies')[0];
    //     var tool = document.getElementById('block-webform');
    //     console.log(tool);
       
    //     alert( 'DOM готов' );
    // }
    

    // document.addEventListener("DOMContentLoaded", ready);

})(window.jQuery, window._);