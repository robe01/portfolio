<?php

    // Only process POST reqeusts.
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if(empty($_POST["from"]))
		{
			//Array of errors
			$errors = array();
			$data = array();

			
			// Get the form fields and remove whitespace.
			$first_name = trim(strip_tags($_POST["firstname"]));
			$last_name = trim(strip_tags($_POST["lastname"]));
			$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
			$telephone = trim(strip_tags($_POST["telephonenumber"]));
			$message = trim(strip_tags($_POST["message"]));


			//First name error check
			if(empty($first_name))
			{
				$errors['firstname'] = 'First name is required.';
			}
			else if( ! preg_match("/^([A-z]+)$/", $first_name))
			{
				$errors['firstname'] = 'Alphabetical characters only.';
			}


			//Last name error check
			if(empty($last_name))
			{
				$errors['lastname'] = 'Last name is required.';
			}
			else if( ! preg_match("/^([A-z]+)$/", $last_name))
			{
				$errors['lastname'] = 'Alphabetical characters only.';
			}


			//Email error check
			if(empty($email))
			{
				$errors['email'] = 'Email is required.';
			}
			else if( ! filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$errors['email'] = 'Email must be valid.';
			}


			//Telephone error check
			if( ! empty($telephone))
			{
				if( ! preg_match("/^\d+$/", $telephone))
				{
					$errors['telephonenumber'] = 'Numerical characters only.';
				}
			}


			//Message error check
			if(empty($message))
			{
				$errors['message'] = 'Message is required.';
			}
			
			//Check for errors
			if( ! empty($errors)) //If not empty then there are errors
			{
				sleep(1);
				$data['success'] = false;
				$data['errors']  = $errors;
			}
			else //The errors array is empty
			{
				// Set the recipient email address.
				$recipient = "topdoghalox@hotmail.com";

				$email_subject = 'Message from website';

				// Build the email content.
				$email_content = "Name: $first_name $last_name\n";
				$email_content .= "Email: $email\n\n";
				$email_content .= "Telephone: $telephone\n\n";
				$email_content .= "Message:\n$message\n";

				// Build the email headers.
				$email_headers = "From: $first_name <$email>";

				// Send the email.
				if (mail($recipient, $email_subject, $email_content, $email_headers)) 
				{
					sleep(2);
					$data['success'] = true;
					$data['message'] = 'Message successfully sent';
				} 
				else 
				{
					sleep(2);
					$data['success'] = true;
					$data['message'] = "Oops! Something went wrong and we couldn't send your message.";
				}
			}
		}
		else 
		{
			sleep(1);
			$data['success'] = true;
			$data['message'] = 'Message successfully sent';
		}
		echo json_encode($data);
	}
	
	
	

