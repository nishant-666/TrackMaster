document.getElementById('issueInputForm').addEventListener('submit', saveIssue);

function saveIssue(e) {
  var issueDesc = document.getElementById('issueDescInput').value;
  var issueSeverity = document.getElementById('issueSeverityInput').value;
  var issueAssignedTo = document.getElementById('issueAssignedToInput').value;
  var issueId = chance.guid();
  var issueStatus = 'Open';

  var issue = {
    id: issueId,
    description: issueDesc,
    severity: issueSeverity,
    assignedTo: issueAssignedTo,
    status: issueStatus
  }

  if (localStorage.getItem('issues') == null) {
    var issues = [];
    issues.push(issue);
    localStorage.setItem('issues', JSON.stringify(issues));
  } else {
    var issues = JSON.parse(localStorage.getItem('issues'));
    issues.push(issue);
    localStorage.setItem('issues', JSON.stringify(issues));
  }

  document.getElementById('issueInputForm').reset();

  fetchIssues();

  e.preventDefault();
}

function setStatusClosed(id) {
  var issues = JSON.parse(localStorage.getItem('issues'));

  for (var i = 0; i < issues.length; i++) {
    if (issues[i].id == id) {
      issues[i].status = 'Solved';
    }
  }

  localStorage.setItem('issues', JSON.stringify(issues));

  fetchIssues();
}

function deleteIssue(id) {
  var issues = JSON.parse(localStorage.getItem('issues'));

  for (var i = 0; i < issues.length; i++) {
    if (issues[i].id == id) {
      issues.splice(i, 1);
    }
  }

  localStorage.setItem('issues', JSON.stringify(issues));

  fetchIssues();
}

function fetchIssues() {
  var issues = JSON.parse(localStorage.getItem('issues'));
  var issuesListe = document.getElementById('issuesList');

  issuesList.innerHTML = '';

  for (var i = 0; i < issues.length; i++) {
    var id = issues[i].id;
    var desc = issues[i].description;
    var severity = issues[i].severity;
    var assignedTo = issues[i].assignedTo;
    var status = issues[i].status;

    issuesList.innerHTML +=   '<div class="col-lg-12">'+
                              '<div class="ui raised very padded text container segment" style="border-radius:20px">'+           
                              '<div class="well" style="border-radius:20px;background-color: white;">'+
                              '<h6 class="ui header">Issue ID: ' + id + '</h6>'+
                              '<div class="ui red label">' + status + '</div>'+
                              '<h1 class="ui header">' + desc + '</h1>'+
                              '<p><i class="level up alternate icon"></i>' + severity + '</p>'+
                              '<p><i class="user outline icon"></i>' + assignedTo + '</p>'+
                              '<a href="#" onclick="setStatusClosed(\''+id+'\')" class="ui primary button"><i class="check icon"></i>Solved</a> '+
                              '<a href="#" onclick="deleteIssue(\''+id+'\')" class="ui red button">  <i class="trash icon"></i>Delete</a>'+
                              '</div>'+
                              '</div>'+
                              '</div>';
  }
}
