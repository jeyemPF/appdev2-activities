#Task#1
<!-- SQL syntax -->
SELECT * FROM students;
<!-- Query Builder -->
 $students = DB::table('students')->get();
 return response()->json(['students' => $students]);

#Task#2
<!-- SQL syntax -->
SELECT * FROM students WHERE grade = '10';
<!-- Query Builder -->
$students = DB::table('students')->where('grade', 10)->get();
return response()->json(['students' => $students]);

#Task#3
<!-- SQL syntax -->
SELECT * FROM students WHERE age BETWEEN 15 AND 18;
<!-- Query Builder -->
$students = DB::table('students')->whereBetween('age', [15, 18])->get();
return response()->json(['students' => $students]);

#Task#4
<!-- SQL syntax -->
SELECT * FROM students WHERE city = 'Manila';
<!-- Query Builder -->
$students = DB::table('students')->where('city', 'Manila')->get();
return response()->json(['students' => $students]);

#Task#5
<!-- SQL syntax -->
SELECT * FROM students ORDER BY age DESC;
<!-- Query Builder -->
$students = DB::table('students')->orderByDesc('age')->get();
return response()->json(['students' => $students]);

#Task#6
<!-- SQL syntax -->
SELECT students.*, teachers.name AS teacher_name 
FROM students 
<!-- Query Builder -->
$studentsWithTeachers = DB::table('students')
            ->leftJoin('teachers', 'students.teacher_id', '=', 'teachers.id')
            ->select('students.*', 'teachers.name AS teacher_name')
            ->get();

        return response()->json(['students_with_teachers' => $studentsWithTeachers]);


#Task#7
<!-- SQL syntax -->
SELECT teachers.id, teachers.name, COUNT(students.id) AS student_count
FROM teachers
LEFT JOIN students ON teachers.id = students.teacher_id
GROUP BY teachers.id, teachers.name;
<!-- Query Builder -->
$teachersWithStudentCount = DB::table('teachers')
    ->leftJoin('students', 'teachers.id', '=', 'students.teacher_id')
    ->select('teachers.id', 'teachers.name', DB::raw('COUNT(students.id) AS student_count'))
    ->groupBy('teachers.id', 'teachers.name')
    ->get();

    return response()->json(['teachers_with_student_count' => $teachersWithStudentCount]);

#Task#8
<!-- SQL syntax -->
SELECT students.*, subjects.name AS subject_name 
FROM students 
INNER JOIN subjects ON students.subject_id = subjects.id;
<!-- Query Builder -->
$studentsWithSubjects = DB::table('students')
            ->join('subjects', 'students.subject_id', '=', 'subjects.id')
            ->select('students.*', 'subjects.name AS subject_name')
            ->get();

        return response()->json(['students_with_subjects' => $studentsWithSubjects]);

#Task#9
<!-- SQL Syntax -->
SELECT students.*, AVG(scores.score) AS average_score 
FROM students 
LEFT JOIN scores ON students.id = scores.student_id 
GROUP BY students.id;
<!-- Query Builder -->
$studentsWithAverageScore = DB::table('students')
            ->select('students.*', DB::raw('(SELECT AVG(score) FROM scores WHERE scores.student_id = students.id) AS average_score'))
            ->get();

        return response()->json(['students_with_average_score' => $studentsWithAverageScore]);

#Task#10

<!-- SQL Syntax -->
SELECT teachers.*, COUNT(students.id) AS student_count 
FROM teachers 
LEFT JOIN students ON teachers.id = students.teacher_id 
GROUP BY teachers.id 
ORDER BY student_count DESC 
LIMIT 5;
<!-- Query Builder -->
$topTeachers = DB::table('teachers')
            ->select('teachers.*', DB::raw('(SELECT COUNT(*) FROM students WHERE students.teacher_id = teachers.id) AS student_count'))
            ->orderByDesc('student_count')
            ->limit(5)
            ->get();

        return response()->json(['top_teachers' => $topTeachers]);
