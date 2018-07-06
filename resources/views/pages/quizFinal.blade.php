@extends('layouts.app')

@section('content')



    <main id="finalePage">
	<div class="container">
		<!-- Final test result details header -->
		<section id="finaleDetails">
			<h2><?= $msg; ?></h2>
			<p>Final Score: &nbsp;&nbsp;<?= $score; ?>%</p>
			<p>Correct: &nbsp;&nbsp;&nbsp;&nbsp;
				<span class="<?= $class; ?>"><?= $_SESSION['score']; ?></span> of
				<span class="correct"><?= $total; ?></span>
			</p>
		</section>

<div class="wrapper">
<!-- Create the questions list -->
<ol id="question_list">
	<?php
	$i = 0; // Start a counter to help break out of each answer group
	while($row = mysqli_fetch_assoc($finale_queries)) :


	// Debugging Purposes
	/*print_r($user_answers);
	echo "<br>";
	echo $row['is_correct'];
	echo "<br>";*/
	if(in_array($row['id'], $user_answers) && $row['is_correct'] != 1) {
		$wrong_answer = "<div class=\"wrong_answer\">
						 <p>Wrong! </p>
						 <p>" . html_entity_decode(htmlspecialchars_decode($row["answers"])) . "</p>
						 </div>";
	}

	if($row['is_correct'] == 1 ) {

		$resource_list = explode(' ', $row['resources']);
		$correct_answer = "<div class=\"correct_answer\">
						   <p><span  class=\"correct\">Correct!</span> &nbsp;&nbsp;" . html_entity_decode(htmlspecialchars_decode($row["answers"])) . "</p>
						   <p>" . html_entity_decode(htmlspecialchars_decode($row["correct_explanation"])) . "</p>";

		if($row['resources'] == null) {
			$correct_answer .= "</div>";
		} else {
			$correct_answer .= "<h4>Resources: </h4>";
			foreach($resource_list as $resource) {
				$resource = html_entity_decode(htmlspecialchars_decode($resource));
				$correct_answer .= "<p class='resource'><a href=" . $resource . " target='_blank'>" . $resource . "</a></p>";
			}

			$correct_answer .= "</div>";
		}

//		echo $row['answers'] . " - " . $row['id'];
	}

	/* Display the questions that were answered */
	$question_number = $row['question_number'];
	if(!in_array($row['question'], $used_questions)) :
		/* Questions Associative Array Based on DB Stored Question Number */
//		$used_questions[$row['question_number']] = $row['question'];
//		$question_ids = []; /* Assoc Array based on question number */
//		array_push($question_ids, $question_number);

		$used_questions[$question_number] = $row['question'];
		$question_number_holder = $question_number;

/* Break out of answer list for each question */
		if($i > 1 ) : ?>
			</ol>
			<?php
//			// If wrong answer is set (The user answered wrong), then display the wrong answer
//			if(isset($wrong_answer)) {
//				echo $wrong_answer;
//				$wrong_answer = null;
//			}
//			// If correct answer is set (The user answered correct), then display the correct answer
//			if(isset($correct_answer)) {
//				echo $correct_answer;
//				$correct_answer = null;
//			}
		endif; ?>


	<li class="question"><?= html_entity_decode(htmlspecialchars_decode($row['question'])); ?></li>
	<ol class="answer_list">
	<?php
	endif;
	$i++;
	$answer_id = $row['id'];
	$answer_ids["$answer_id"] = $row['answers'];
	if($question_number === $question_number_holder) :
		if(in_array($row['id'], $user_answers) && $row['is_correct'] != 1) : ?>
	<li class="wrong"><?= html_entity_decode(htmlspecialchars_decode($row['answers'])); ?></li>
	<!--  . " - " . $row['id'] -->
		<?php elseif($row['is_correct'] == 1 ) : ?>
		<!-- && in_array($row['id'], $user_answers) -->
	<li class="correct"><?= html_entity_decode(htmlspecialchars_decode($row['answers'])); ?></li>
	<!--  . " - " . $row['id'] -->
		<?php //= "Line:  " . __LINE__ . "<br>"; ?>
		<?php //echo s$correct_answer; ?>
		<?php else : ?>
	<li><?= html_entity_decode(htmlspecialchars_decode($row['answers']));  ?></li>	<!--  . " - " . $row['id'] -->
		<?php endif; ?>
	<?php endif; ?>

	<?php if($i >= $number_of_rows) : ?>

		</ol>
		<?php
//		if(in_array($row['id'], $user_answers) && $row['is_correct'] != 1) {
//			echo $wrong_answer;
//		}
//
//		if(isset($correct_answer)) {
//			echo $correct_answer;
//		}
		?>


	<?php endif; ?>

	<?php
//		echo "Row id == " . $row['id'] . "<br>";
//		echo "Row correct == " . $row['is_correct'] . "<br>"; ?>
	<?php endwhile; ?>
	<?php //echo $correct_answer; ?>
</ol>
</div>

		<a href="index.php" class="retake">Take Quiz Again</a>
<!--
		<br>
		<a href="tester3.php">Go to test page</a>
-->
	</div>
</main>



@endsection
