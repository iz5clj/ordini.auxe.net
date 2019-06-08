<h2>Salut {{ $nome }}.</h2>
<p>This is a test mail.</p>
<p>Comment vas tu?</p>
<p>Email envoyé le: {{ Carbon\Carbon::now()->toDateTimeString() }}</p>
