
function calculateGradeAndGpa(marks) {
    if (marks >= 80) return { grade: 'A+', gpa: 4.00 };
    if (marks >= 75) return { grade: 'A', gpa: 3.75 };
    if (marks >= 70) return { grade: 'A-', gpa: 3.50 };
    if (marks >= 65) return { grade: 'B+', gpa: 3.25 };
    if (marks >= 60) return { grade: 'B', gpa: 3.00 };
    if (marks >= 55) return { grade: 'B-', gpa: 2.75 };
    if (marks >= 50) return { grade: 'C+', gpa: 2.50 };
    if (marks >= 45) return { grade: 'C', gpa: 2.25 };
    if (marks >= 40) return { grade: 'D', gpa: 2.00 };
    return { grade: 'F', gpa: 0.00 };
}

function calculateCGPA() {
    let subject1_marks = document.getElementById("subject1").value;
    let subject1_credits = document.getElementById("subject1_credits").value;
    let subject2_marks = document.getElementById("subject2").value;
    let subject2_credits = document.getElementById("subject2_credits").value;
    let subject3_marks = document.getElementById("subject3").value;
    let subject3_credits = document.getElementById("subject3_credits").value;

    let subject1 = calculateGradeAndGpa(subject1_marks);
    let subject2 = calculateGradeAndGpa(subject2_marks);
    let subject3 = calculateGradeAndGpa(subject3_marks);

    document.getElementById("subject1_grade").innerText = subject1.grade;
    document.getElementById("subject1_gpa").innerText = subject1.gpa;
    document.getElementById("subject2_grade").innerText = subject2.grade;
    document.getElementById("subject2_gpa").innerText = subject2.gpa;
    document.getElementById("subject3_grade").innerText = subject3.grade;
    document.getElementById("subject3_gpa").innerText = subject3.gpa;

    let total_credits = parseFloat(subject1_credits) + parseFloat(subject2_credits) + parseFloat(subject3_credits);
    let cgpa = ((subject1.gpa * subject1_credits) + (subject2.gpa * subject2_credits) + (subject3.gpa * subject3_credits)) / total_credits;

    document.getElementById("cgpa").value = cgpa.toFixed(2);
    document.getElementById("result").innerText = "CGPA: " + cgpa.toFixed(2);
}
