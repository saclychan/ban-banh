<?php
		$target = "../pic-product/";
		$target = $target . basename( $_FILES['uploaded']['name']) ;
		$_SESSION['test'] = $_FILES;
		
		// Xử lý up ảnh
		else
		{
			if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
			{
				echo "Tải thành công ". basename( $_FILES['uploadedfile']['name']);
			}
			else
			{
				echo "Tải lên thất bại!";
			}
		}
?>