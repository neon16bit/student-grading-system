function calculateCGPA() {
    const subject1 = parseFloat(document.getElementById('subject1').value);
    const subject1Credits = parseFloat(document.getElementById('subject1_credits').value);
    const subject2 = parseFloat(document.getElementById('subject2').value);
    const subject2Credits = parseFloat(document.getElementById('subject2_credits').value);
    const subject3 = parseFloat(document.getElementById('subject3').value);
    const subject3Credits = parseFloat(document.getElementById('subject3_credits').value);

    const totalMarks = (subject1 * subject1Credits) + (subject2 * subject2Credits) + (subject3 * subject3Credits);
    const totalCredits = subject1Credits + subject2Credits + subject3Credits;

    const cgpa = totalMarks / totalCredits;

    document.getElementById('cgpa').value = cgpa.toFixed(2);
    document.getElementById('result').innerText = `Calculated CGPA: ${cgpa.toFixed(2)}`;
}
