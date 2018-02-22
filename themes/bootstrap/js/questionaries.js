(function ($, _) {
    "use strict";

    var baseUrl = location.origin;
    var format = '?_format=json';
    var employeeQuestionaries = [];
    var teamleadQuestionaries = [];
    

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
                employeeQuestionaries = JSON.parse(xhr.responseText);
            }
        }
    
        xhr.send();
    }

    sendAjaxRequest(baseUrl + '/rest/views/employee-questionnairies' + format);

    
    // console.log(sendAjaxRequest(baseUrl + '/rest/views/employee-questionnairies' + format, employeeQuestionaries));
    // teamleadQuestionaries = sendAjaxRequest(baseUrl + '/rest/views/teamlead-questionnairies' + format);

    
    // document.onload
    window.onload = function(){
        
        console.log(employeeQuestionaries);

        var workTabContainer = document.getElementsByClassName('manage-questionnairies')[0];
        // var fullTable;
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

            var employeeTableRow = document.createElement('tr');


            newTableBody.insertBefore(employeeTableRow,null);

            // document.createElement('tr').insertBefore(document.createElement('td'),null).innerHTML = key;
            // newTableCell.innerHTML = key;

            for (var employeeFieldKey in employeeQuestionaries[employeeQuestionnareKey]) {
                var employeeTableCell = document.createElement('td');

                employeeTableRow.insertBefore(employeeTableCell,null);

                switch (employeeFieldKey){
                    default:  employeeTableCell.innerHTML = employeeQuestionaries[employeeQuestionnareKey][employeeFieldKey];
                }


                console.log('field name: ' + employeeFieldKey + ' | field value: ' + employeeQuestionaries[employeeQuestionnareKey][employeeFieldKey]);
            }
        }

        workTabContainer.insertBefore(newTable, workTabContainer.firstChild);
    }

})(window.jQuery, window._);