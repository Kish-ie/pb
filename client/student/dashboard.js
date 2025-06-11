document.addEventListener('DOMContentLoaded', function() {
    // Fetch user data from the backend
    fetchUserData();
    fetchCourses();
    fetchExams();
    fetchAnnouncements();
});

function fetchUserData() {
    // Simulate fetching user data from the backend
    const username = 'John Doe'; // Replace with actual user data
    document.getElementById('username').textContent = username;
}

function fetchCourses() {
    // Simulate fetching courses from the backend
    const courses = [
        { name: 'Certified Public Accountants (CPA)', status: 'In Progress' },
        { name: 'Accounting Technicians Diploma (ATD)', status: 'Completed' },
        { name: 'Computer Packages Certification', status: 'Upcoming' }
    ];

    const coursesList = document.getElementById('my-courses');
    courses.forEach(course => {
        const li = document.createElement('li');
        li.textContent = `${course.name} - ${course.status}`;
        coursesList.appendChild(li);
    });
}

function fetchExams() {
    // Simulate fetching exams from the backend
    const exams = [
        { name: 'CPA Midterm', date: '2023-10-15' },
        { name: 'ATD Final', date: '2023-12-20' }
    ];

    const examsList = document.getElementById('upcoming-exams');
    exams.forEach(exam => {
        const li = document.createElement('li');
        li.textContent = `${exam.name} - ${exam.date}`;
        examsList.appendChild(li);
    });
}

function fetchAnnouncements() {
    // Simulate fetching announcements from the backend
    const announcements = [
        { title: 'New Course Available', date: '2023-09-01' },
        { title: 'Exam Schedule Updated', date: '2023-08-25' }
    ];

    const announcementsList = document.getElementById('recent-announcements');
    announcements.forEach(announcement => {
        const li = document.createElement('li');
        li.textContent = `${announcement.title} - ${announcement.date}`;
        announcementsList.appendChild(li);
    });
}