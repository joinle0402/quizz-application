<?php

  if (isset($_POST['create_question'])) {
    define('HOSTNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'quizz_application');

    $connection = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    $question_name = $_POST['question_name'];
    $answer_name_1 = $_POST['answer_name_1'];
    $answer_name_2 = $_POST['answer_name_2'];
    $answer_name_3 = $_POST['answer_name_3'];
    $answer_name_4 = $_POST['answer_name_4'];
    $answer_correct = $_POST['answer_correct'];

    $sql = "INSERT INTO questions(question_name) VALUES('$question_name')";
    echo mysqli_query($connection, $sql) ? "Tạo câu hỏi thành công" : "Lỗi: " . $sql . "<br>" . mysqli_error($connection);

    $sql = "INSERT INTO answers(answer_name, is_correct, question_id) VALUES('".$answer_name_1."')";
    echo mysqli_query($connection, $sql) ? "Tạo câu trả lời thành công" : "Lỗi: " . $sql . "<br>" . mysqli_error($connection);

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quizz Form</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="header">Quizz Form</header>

  <main class="main">
    <form method="POST" action="quizz-form.php" class="quiz-form-wrapper">
      <div class="form-group">
        <label for="#" class="form-label">Tên câu hỏi:</label>
        <input name="question_name" type="text" class="form-input">
      </div>

      <div class="form-group-anwsers">
        <div class="form-group">
          <label for="#" class="form-label">Câu trả lời 1:</label>
          <input name="answer_name_1" type="text" class="form-input">
        </div>

        <div class="form-group">
          <label for="#" class="form-label">Câu trả lời 2:</label>
          <input name="answer_name_2" type="text" class="form-input">
        </div>

        <div class="form-group">
          <label for="#" class="form-label">Câu trả lời 3:</label>
          <input name="answer_name_3" type="text" class="form-input">
        </div>

        <div class="form-group">
          <label for="#" class="form-label">Câu trả lời 4:</label>
          <input name="answer_name_4" type="text" class="form-input">
        </div>
      </div>

      <div class="form-group">
        <label for="select_is_correct" class="form-label">Câu trả lời đúng:</label>
        <select class="form-input" name="answer_correct" id="select_is_correct">
          <option value="1">Câu trả lời 1</option>
          <option value="2">Câu trả lời 2</option>
          <option value="3">Câu trả lời 3</option>
          <option value="4">Câu trả lời 4</option>
        </select>
      </div>
      <div class="form-submit">
        <input class="main-button main-button-create" type="submit" name="create_question" value="Create">
      </div>
    </form>
  </main>
</body>

</html>
