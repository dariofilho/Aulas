<!DOCTYPE HTML>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
	body {
		font-family: "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
		font-size: 14px;
	}
	
	h1 {
		font-size: 1em;
	}
	.exemplo {
		border: 0.1em solid #eee;
		padding: 1em;
		width: 13em;
		float: left;
		margin-right: inherit;
		margin-bottom: inherit;
		min-height: 280px;
	}
	
	.exemplo p,
	.exemplo div {
		margin-bottom: 1em;
		margin-top: 1em;
	}
	
	.elementos {
		border-left: 1px solid #ccc;
		padding-left: 1em;
	}
	
	.elementos:empty{
		background-color: red;
		height: 1em;
	}
	
	.target		 	p:target,
	.active		 	p:active,
	.hover		 	p:hover,
	.selection	 	p::selection,
	.firstLetter	p:first-letter,
	.firstLine		p:first-line,
	.num 			p:nth-child(3),
	.lastNum 		p:nth-last-child(3),
	.odd 			p:nth-child(odd),
	.even 			p:nth-child(even),
	.first-child 	p:first-child,
	.last-child 	p:last-child,
	.exp2n 			p:nth-child(2n),
	.exp2np1 		p:nth-child(2n+1),
	.exp3nm1 		p:nth-child(3n-1),
	.exp3n 			p:nth-child(3n),
	.exp3np1 		p:nth-child(3n+1),
	.exp3np2 		p:nth-child(3n+2),
	.expm1np5 		p:nth-child(-1n+5),
	.exm1np2 		p:nth-last-child(-1n+2),
	.expnp6 		p:nth-child(n+6),
	.onlyChild		p:only-child,
	.onlyOfType		p:only-of-type,
	.not4			p:nth-of-type(4),
	.not4div		div:nth-of-type(4),
	.lastNot2		p:nth-last-of-type(2),
	.firstOfType	p:first-of-type,
	.lastOfType		div:last-of-type {
		color: red;
	}
	</style><?php
	
	function exemplo($classe){
		echo '<div class="elementos '.$classe.'">'."\n";
		for($i = 1; $i<=10; $i++) {
			echo '<p id="'.$classe.$i.'">Parágrafo '.$i."</p>\n";
		}
		echo '</div>';
	}
	function exemplo2($classe){
		echo '<div class="elementos '.$classe.'">';
		for($i = 1; $i<=5; $i++) {
			echo "<div>Div ".$i."</div>\n";
		}
		for($i = 1; $i<=5; $i++) {
			echo "<p>Parágrafo ".$i."</p>\n";
		}
		echo '</div>';
	}
	?>
</head>
<body>
	
	<a href="#target4">Mostrar 4o parágrafo</a><br/>
	<div class="exemplo">
		<h1>p:target</h1>
		<?php exemplo("target"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:active</h1>
		<?php exemplo("active"); ?>
	</div>
	
	
	<div class="exemplo">
		<h1>p:hover</h1>
		<?php exemplo("hover"); ?>
	</div>
	
	
	<div class="exemplo">
		<h1>p:selection</h1>
		<?php exemplo("selection"); ?>
	</div>
	
	
	<div class="exemplo">
		<h1>p:first-letter</h1>
		<?php exemplo("firstLetter"); ?>
	</div>
	
	<div class="exemplo">
			<h1>p:first-line</h1>
			<div class="elementos firstLine">
	<p>Lorem ipsum dolor sit amet, consectetur   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	</div>	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(3)</h1>
		<?php exemplo("num"); ?>
	</div>

	
	<div class="exemplo">
		<h1>p:nth-last-child(3)</h1>
		<?php exemplo("lastNum"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(odd)</h1>
		<?php exemplo("odd"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(even)</h1>
		<?php exemplo("even"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:first-child</h1>
		<?php exemplo("first-child"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:last-child</h1>
		<?php exemplo("last-child"); ?>
	</div>

	<div class="exemplo">
		<h1>p:nth-child(2n)</h1>
		<?php exemplo("exp2n"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(2n+1)</h1>
		<?php exemplo("exp2np1"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(3n)</h1>
		<?php exemplo("exp3n"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(3n-1)</h1>
		<?php exemplo("exp3nm1"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(3n+1)</h1>
		<?php exemplo("exp3np1"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(3n+2)</h1>
		<?php exemplo("exp3np2"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(-1n+5)</h1>
		<?php exemplo("expm1np5"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:nth-child(n+6)</h1>
		<?php exemplo("expnp6"); ?>
	</div>

	
	<div class="exemplo">
		<h1>div:nth-last-child(-1n+2)</h1>
		<?php exemplo("exm1np2"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:only-child</h1>
		<div class="elementos onlyChild">
			<p>Parágrafo</p>
		</div>
	</div>
	
	<div class="exemplo">
		<h1>p:only-child</h1>
		<div class="elementos onlyChild">
			<p>Parágrafo</p>
			<p>Parágrafo</p>
		</div>
	</div>

	<div class="exemplo">
		<h1>p:only-of-type</h1>
		<div class="elementos onlyOfType">
			<p>Parágrafo</p>
		</div>
	</div>

	<div class="exemplo">
		<h1>p:only-of-type</h1>
		<div class="elementos onlyOfType">
			<p>Parágrafo</p>
			<p>Parágrafo</p>
		</div>
	</div>
	
	<div class="exemplo">
		<h1>p:only-of-type</h1>
		<div class="elementos onlyOfType">
			<div>Div</div>
			<p>Parágrafo</p>
		</div>
	</div>
	
	<div class="exemplo">
		<h1>p:only-of-type</h1>
		<div class="elementos onlyOfType">
			<div>Div</div>
			<p>Parágrafo</p>
			<p>Parágrafo</p>
		</div>
	</div>
	
	<div class="exemplo">
		<h1>.elementos:empty</h1>
		<div class="elementos"></div>
	</div>

	<div class="exemplo">
		<h1>p:nth-of-type(4)</h1>
		<?php exemplo2("not4"); ?>
	</div>
	
	<div class="exemplo">
		<h1>div:nth-of-type(4)</h1>
		<?php exemplo2("not4div"); ?>
	</div>

	<div class="exemplo">
		<h1>p:nth-last-of-type(2)</h1>
		<?php exemplo2("lastNot2"); ?>
	</div>
	
	<div class="exemplo">
		<h1>p:first-of-type</h1>
		<?php exemplo2("firstOfType"); ?>
	</div>
	
	<div class="exemplo">
		<h1>div:last-of-type</h1>
		<?php exemplo2("lastOfType"); ?>
	</div>
	
	
</body>
</html>