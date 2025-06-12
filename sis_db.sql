-- schema converted to postgresql format
-- --------------------------------------------------------

--
-- Table structure for table academic_history
--

CREATE TABLE academic_history (
  id INTEGER NOT NULL,
  student_id INTEGER NOT NULL,
  course_id INTEGER NOT NULL,
  semester VARCHAR(200) NOT NULL,
  year VARCHAR(200) NOT NULL,
  school_year TEXT NOT NULL,
  status INTEGER NOT NULL DEFAULT 1, -- 1= New, 2= Regular, 3= Returnee, 4= Transferee
  end_status SMALLINT NOT NULL DEFAULT 0, -- 0=pending, 1=Completed, 2=Dropout, 3=failed, 4=Transferred-out, 5=Graduated
  date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_updated TIMESTAMP DEFAULT NULL
);


--
-- Dumping data for table academic_history
--

INSERT INTO academic_history (id, student_id, course_id, semester, year, school_year, status, end_status, date_created, date_updated) VALUES
(1, 1, 11, 'First Semester', '1st Year', '2018-2019', 1, 1, '2022-01-27 13:02:36', '2022-01-27 13:22:31'),
(2, 1, 11, 'Second Semester', '1st Year', '2018-2019', 2, 1, '2022-01-27 13:22:24', '2022-01-27 13:22:44'),
(3, 1, 11, 'Third Semester', '1st Year', '2018-2019', 2, 1, '2022-01-27 13:23:32', NULL),
(5, 1, 11, 'First Semester', '2nd Year', '2019-2020', 2, 1, '2022-01-27 13:28:01', NULL),
(6, 1, 11, 'Second Semester', '2nd Year', '2019-2020', 2, 1, '2022-01-27 13:28:26', NULL),
(7, 1, 11, 'Third Semester', '2nd Year', '2019-2020', 2, 2, '2022-01-27 13:28:52', NULL);

-- --------------------------------------------------------

CREATE TABLE course_list (
  id INTEGER NOT NULL,
  department_id INTEGER NOT NULL,
  name TEXT NOT NULL,
  description TEXT NOT NULL,
  status SMALLINT NOT NULL DEFAULT 1,
  delete_flag SMALLINT NOT NULL DEFAULT 0,
  date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_updated TIMESTAMP DEFAULT NULL
);


INSERT INTO course_list (id, department_id, name, description, status, delete_flag, date_created, date_updated) VALUES
(1, 2, 'BSIT', 'Bachelor of Science in Information Technology', 1, 0, '2022-01-27 10:03:25', NULL),
(2, 4, 'BEEd', 'Bachelor of Elementary Education', 1, 0, '2022-01-27 10:06:43', NULL),
(3, 4, 'BSEd', 'Bachelor of Secondary Education', 1, 0, '2022-01-27 10:07:21', NULL),
(4, 4, 'MAEd', 'Master of Arts in Education', 1, 0, '2022-01-27 10:07:52', NULL),
(5, 4, 'PhD Educ', 'Doctor of Philosophy in Education', 1, 0, '2022-01-27 10:08:21', NULL),
(6, 1, 'BSCE', 'Bachelor of Science in Civil Engineering', 1, 0, '2022-01-27 10:08:48', NULL),
(7, 1, 'MSCE', 'Master of Science in Civil Engineering', 1, 0, '2022-01-27 10:09:00', NULL),
(8, 1, 'BS ChE', 'Bachelor of Science in Chemical Engineering', 1, 0, '2022-01-27 10:09:35', NULL),
(9, 1, 'MS ChE', 'Master of Science in Chemical Engineering', 1, 0, '2022-01-27 10:10:16', NULL),
(10, 1, 'DEngg ChE', 'Doctor of Engineering (Chemical Engineering)', 1, 0, '2022-01-27 10:10:39', NULL),
(11, 1, 'BSCS', 'Bachelor of Science in Computer Science', 1, 0, '2022-01-27 10:12:23', NULL),
(12, 1, 'MSCS', 'Master of Science in Computer Science', 1, 0, '2022-01-27 10:12:35', NULL);

CREATE TABLE department_list (
  id INTEGER NOT NULL,
  name TEXT NOT NULL,
  description TEXT NOT NULL,
  status SMALLINT NOT NULL DEFAULT 1,
  delete_flag SMALLINT NOT NULL DEFAULT 0,
  date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_updated TIMESTAMP DEFAULT NULL
);

INSERT INTO department_list (id, name, description, status, delete_flag, date_created, date_updated) VALUES
(1, 'CoEng', 'College of Engineering', 1, 0, '2022-01-27 09:22:31', '2022-01-27 09:33:36'),
(2, 'CoAS', 'College of Arts and Science', 1, 0, '2022-01-27 09:22:54', '2022-01-27 09:33:03'),
(3, 'CoB', 'College of Business', 1, 0, '2022-01-27 09:23:20', '2022-01-27 09:33:11'),
(4, 'CoE', 'College of Education', 1, 0, '2022-01-27 09:25:42', '2022-01-27 09:33:18'),
(5, 'CSSP', 'College of Social Sciences and Philosophy', 1, 0, '2022-01-27 09:26:35', '2022-01-27 09:33:49'),
(6, 'Sample101', 'Deleted Department', 1, 1, '2022-01-27 09:27:17', '2022-01-27 09:27:28');

--
-- Table structure for table student_list
--

BEGIN;

-- Create the table
CREATE TABLE student_list (
  id INTEGER NOT NULL,
  roll VARCHAR(100) NOT NULL,
  firstname TEXT NOT NULL,
  middlename TEXT DEFAULT NULL,
  lastname TEXT NOT NULL,
  gender VARCHAR(100) NOT NULL,
  contact TEXT NOT NULL,
  present_address TEXT NOT NULL,
  permanent_address TEXT NOT NULL,
  dob DATE NOT NULL,
  status SMALLINT NOT NULL DEFAULT 1,
  delete_flag SMALLINT NOT NULL DEFAULT 0,
  date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_updated TIMESTAMP DEFAULT NULL
);

-- Create the auto-update function
CREATE OR REPLACE FUNCTION update_student_timestamp()
RETURNS TRIGGER AS $$
BEGIN
  NEW.date_updated := CURRENT_TIMESTAMP;
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Attach the trigger
CREATE TRIGGER set_student_timestamp
BEFORE UPDATE ON student_list
FOR EACH ROW
EXECUTE FUNCTION update_student_timestamp();

COMMIT;


INSERT INTO student_list (
  id, roll, firstname, middlename, lastname, gender, contact,
  present_address, permanent_address, dob, status, delete_flag,
  date_created, date_updated
) VALUES (
  1, '231415061007', 'Mark', 'D', 'Cooper', 'Male', '09123456789',
  'This my sample present address.', 'This my sample permanent address.',
  '2007-06-23', 1, 0, '2022-01-27 11:14:07', '2022-01-28 08:50:13'
);

--
-- Table structure for table system_info
--

CREATE TABLE system_info (
  id INTEGER NOT NULL,
  meta_field TEXT NOT NULL,
  meta_value TEXT NOT NULL
);


--
-- Dumping data for table system_info
--

INSERT INTO system_info (id, meta_field, meta_value) VALUES
(1, 'name', 'Student Information System'),
(6, 'short_name', 'SIS - PHP'),
(11, 'logo', 'uploads/logo-1643245863.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1643245863.png');


-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  id INTEGER NOT NULL,
  firstname VARCHAR(250) NOT NULL,
  middlename TEXT DEFAULT NULL,
  lastname VARCHAR(250) NOT NULL,
  username TEXT NOT NULL,
  password TEXT NOT NULL,
  avatar TEXT DEFAULT NULL,
  last_login TIMESTAMP DEFAULT NULL,
  type SMALLINT NOT NULL DEFAULT 0,
  status INTEGER NOT NULL DEFAULT 1, -- 0 = not verified, 1 = verified
  date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_updated TIMESTAMP DEFAULT NULL
);
CREATE OR REPLACE FUNCTION update_user_timestamp()
RETURNS TRIGGER AS $$
BEGIN
  NEW.date_updated := CURRENT_TIMESTAMP;
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER set_user_timestamp
BEFORE UPDATE ON users
FOR EACH ROW
EXECUTE FUNCTION update_user_timestamp();


--
-- Dumping data for table users
--

INSERT INTO users (
  id, firstname, middlename, lastname, username, password, avatar,
  last_login, type, status, date_added, date_updated
) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1639468007', NULL, 1, 1, '2021-01-20 14:02:37', '2021-12-14 15:47:08'),
(8, 'Claire', NULL, 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', 'uploads/avatar-8.png?v=1643185259', NULL, 2, 1, '2022-01-26 16:20:59', '2022-01-26 16:20:59');

--
-- Indexes for dumped tables
--
-- academic_history
ALTER TABLE academic_history
  ADD PRIMARY KEY (id);

CREATE INDEX idx_academic_history_student ON academic_history(student_id);
CREATE INDEX idx_academic_history_course ON academic_history(course_id);

-- course_list
ALTER TABLE course_list
  ADD PRIMARY KEY (id);

CREATE INDEX idx_course_department ON course_list(department_id);

-- department_list
ALTER TABLE department_list
  ADD PRIMARY KEY (id);

-- student_list
ALTER TABLE student_list
  ADD PRIMARY KEY (id);

-- system_info
ALTER TABLE system_info
  ADD PRIMARY KEY (id);

-- users
ALTER TABLE users
  ADD PRIMARY KEY (id);


-- Create sequences and attach to id columns

-- academic_history
CREATE SEQUENCE academic_history_id_seq START WITH 8 OWNED BY academic_history.id;
ALTER TABLE academic_history ALTER COLUMN id SET DEFAULT nextval('academic_history_id_seq');

-- course_list
CREATE SEQUENCE course_list_id_seq START WITH 13 OWNED BY course_list.id;
ALTER TABLE course_list ALTER COLUMN id SET DEFAULT nextval('course_list_id_seq');

-- department_list
CREATE SEQUENCE department_list_id_seq START WITH 7 OWNED BY department_list.id;
ALTER TABLE department_list ALTER COLUMN id SET DEFAULT nextval('department_list_id_seq');

-- student_list
CREATE SEQUENCE student_list_id_seq START WITH 3 OWNED BY student_list.id;
ALTER TABLE student_list ALTER COLUMN id SET DEFAULT nextval('student_list_id_seq');

-- system_info
CREATE SEQUENCE system_info_id_seq START WITH 25 OWNED BY system_info.id;
ALTER TABLE system_info ALTER COLUMN id SET DEFAULT nextval('system_info_id_seq');

-- users
CREATE SEQUENCE users_id_seq START WITH 9 OWNED BY users.id;
ALTER TABLE users ALTER COLUMN id SET DEFAULT nextval('users_id_seq');


-- academic_history → student_list, course_list
ALTER TABLE academic_history
  ADD CONSTRAINT fk_academic_student
    FOREIGN KEY (student_id) REFERENCES student_list(id) ON DELETE CASCADE,
  ADD CONSTRAINT fk_academic_course
    FOREIGN KEY (course_id) REFERENCES course_list(id) ON DELETE CASCADE;

-- course_list → department_list
ALTER TABLE course_list
  ADD CONSTRAINT fk_course_department
    FOREIGN KEY (department_id) REFERENCES department_list(id) ON DELETE CASCADE;
