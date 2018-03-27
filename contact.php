<?php
	include_once 'header.php';
?>
<h1 class="evidenzia">Contattaci</h1>
<section>
<div class="form-wrapper" id='wrapper'>
  <form class='form' action="includes/contacts.inc.php" method="POST">
    <p class='field required half'>
      <label class='label required' for='eMail'>eMail</label><br>
      <input class='text-input' name='email' required>
    </p>
    <p class='field required half'>
      <label class='label' for='Oggetto'>Oggetto</label><br>
      <input class='text-input' name='oggMail' required>
    </p>
    <p class='field'>
      <label class='label' for='message'>Messaggio</label><br>
      <textarea class='textarea' cols='50' id='message' name='message' required rows='4'></textarea>
    </p>
    <p class='field'>
      <input class='button' type='submit' name="button" value='Invia'>
    </p>
  </form>
</div>
</section>
<br><br><br><br><br><br><br><br><br>
<section class="main-container">
	<div class="form-wrapper">
		
		<form class="signup-form" action="includes/contacts.inc.php" method="POST" >

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

<?php
	include_once 'footer.php';
?>


