<?php
	include_once '../header.php';
?>

<br><br><br><br>
<h1 class="evidenzia">Contattaci</h1>

<section class="main-container">
	<div class="form-wrapper">
		
		<form class="signup-form" action="../includes/contacts.inc.php" method="POST" >

			 <table class="storage">
                        <tr>
                            <th>
                                <label>Tua Email : </label>
                            </th>
                            <th>
                                <input type="text" name="email" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                               <label>Oggetto : </label>
                            </th>    
                            <th>
                                <input type="text" name="oggMail" required>
                            </th>
                        </tr>
                        <tr>
                </table>
                <label>Testo : </label>
                <br>
                <textarea name="messMail" rows="10" cols="50" placeholder="     Inserisci qui il tuo messaggio" required></textarea>	    
			 
                <div class="center">
                    <button type="submit" class="button" name="button">Invia</button>
				</div>
		</form>
	</div>
</section>

