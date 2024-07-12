
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

    let total_credits = parseFloat(subject1_credits) + parseFloat(subject2_credits) + parseFloat(subject3_credits);
    let cgpa = ((subject1.gpa * subject1_credits) + (subject2.gpa * subject2_credits) + (subject3.gpa * subject3_credits)) / total_credits;

    document.getElementById("cgpa").value = cgpa.toFixed(2);
    document.getElementById("result").innerText = "CGPA: " + cgpa.toFixed(2);
}

document.addEventListener('DOMContentLoaded', function () {
    const subjects = ['Computer Networks', 'Internet Programming', 'Database'];
    let allInputsFilled = false;

    subjects.forEach((subject, index) => {
        const subjectNumber = index + 1;
        const marksInput = document.getElementById(`subject${subjectNumber}`);
        const creditsInput = document.getElementById(`subject${subjectNumber}_credits`);
        const gradeGpaGroup = document.getElementById(`grade-gpa-group-${subjectNumber}`);

        function checkInputs() {
            if (marksInput.value !== '' && creditsInput.value !== '') {
                gradeGpaGroup.style.display = 'block';
                updateGradeAndGPA(subjectNumber);
                checkAllInputs();
            } else {
                gradeGpaGroup.style.display = 'none';
                allInputsFilled = false;
            }
        }

        marksInput.addEventListener('input', checkInputs);
        creditsInput.addEventListener('input', checkInputs);
    });

    function checkAllInputs() {
        allInputsFilled = subjects.every((_, index) => {
            const subjectNumber = index + 1;
            const marksInput = document.getElementById(`subject${subjectNumber}`);
            const creditsInput = document.getElementById(`subject${subjectNumber}_credits`);
            return marksInput.value !== '' && creditsInput.value !== '';
        });

        if (allInputsFilled) {
            calculateCGPA();
        }
    }
});

function updateGradeAndGPA(subjectNumber) {
    const marks = document.getElementById(`subject${subjectNumber}`).value;
    const result = calculateGradeAndGpa(marks);
    document.getElementById(`subject${subjectNumber}_grade`).textContent = result.grade;
    document.getElementById(`subject${subjectNumber}_gpa`).textContent = result.gpa.toFixed(2);
}
