function toggleFields() {
    var studentType = document.getElementById('studentType').value;
    var newStudentFields = document.getElementById('newStudentFields');
    var schoolYearFields = document.getElementById('schoolYearFields');

    // Show/hide fields based on the selected student type
    if (studentType === 'New') { // New
        newStudentFields.style.display = 'block';
        schoolYearFields.style.display = 'block';
    } else {
        newStudentFields.style.display = 'none';
        schoolYearFields.style.display = 'none';
    }
}
