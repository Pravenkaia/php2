<?
trait PrintThis {
	public function toPrint() {
		echo '<h1>' . $this->a . '</h1>';
		echo '<h2>' . $this->b . '</h2>';
		echo '<h3>' . $this->d . '</h3>';
	}
}
?>