<?php 


$xusername = 'root';  
$xpassword = '';





  

if ($_SERVER["HTTP_HOST"] === 'localhost') {  

}
else if($_SERVER["HTTP_HOST"] === 'mit.tweakitonline.com'){
$xusername = 'root';  
$xpassword = 'hi1kHtFX56fgMmB';

} 
else{
$xusername = 'root';  
  $xpassword = 'pzfD6vEyhm8Xq7AvbMv3';  
 }


echo 'HTTP HOST: '.$_SERVER["HTTP_HOST"].'<br>';
echo "username: $xusername<br>";
echo "password: $xpassword<br>";


function SplitSQL($file, $delimiter = ';')
{
    set_time_limit(0);

    if (is_file($file) === true)
    {
        $file = fopen($file, 'r');

        if (is_resource($file) === true)
        {
            $query = array();

            while (feof($file) === false)
            {
                $query[] = fgets($file);

                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
                {
                    $query = trim(implode('', $query));

                    if (mysql_query($query) === false)
                    {
                        echo '<p>ERROR: <blockquote> ' . $query . '</blockquote></p>' . "\n";
                    }

                    else
                    {
                       
                    }

                    while (ob_get_level() > 0)
                    {
                        ob_end_flush();
                    }

                    flush();
                }

                if (is_string($query) === true)
                {
                    $query = array();
                }
            }

            return fclose($file);
        }
    }

    return false;
}


function icit_srdb_define_find( $filename = 'wp-config.php' ) {

	$filename = dirname( __FILE__ ) . '/' . basename( $filename );

	if ( file_exists( $filename ) && is_file( $filename ) && is_readable( $filename ) ) {
		$file = @fopen( $filename, 'r' );
		$file_content = fread( $file, filesize( $filename ) );
		@fclose( $file );
	}

	preg_match_all( '/define\s*?\(\s*?([\'"])(DB_NAME|DB_USER|DB_PASSWORD|DB_HOST|DB_CHARSET)\1\s*?,\s*?([\'"])([^\3]*?)\3\s*?\)\s*?;/si', $file_content, $defines );

	if ( ( isset( $defines[ 2 ] ) && ! empty( $defines[ 2 ] ) ) && ( isset( $defines[ 4 ] ) && ! empty( $defines[ 4 ] ) ) ) {
		foreach( $defines[ 2 ] as $key => $define ) {

			switch( $define ) {
				case 'DB_NAME':
					$name = $defines[ 4 ][ $key ];
					break;
				case 'DB_USER':
					$user = $defines[ 4 ][ $key ];
					break;
				case 'DB_PASSWORD':
					$pass = $defines[ 4 ][ $key ];
					break;
				case 'DB_HOST':
					$host = $defines[ 4 ][ $key ];
					break;
				case 'DB_CHARSET':
					$char = $defines[ 4 ][ $key ];
					break;
			}
		}
	}

	return array( $host, $name, $user, $pass, $char );
}


// Scan wp-config for the defines. We can't just include it as it will try and load the whole of wordpress.
if ( file_exists( dirname( __FILE__ ) . '/wp-config.php' ) )
	list( $host, $data, $user, $pass, $char ) = icit_srdb_define_find( 'wp-config.php' );

@$dump = $_POST['dump']; 

if(isset($_POST['submit']))
{
	echo "<div style='color:red'>";
	echo 'creating database........ <br>';

	mysql_connect('localhost', $xusername, $xpassword) or die("Error connecting to MySQL server: ".mysql_error());

	/* if database exist drop it */
	if (mysql_query("DROP DATABASE IF EXISTS $data"))
		 {
        echo "Database Dropped<br>";
	    }
	    else
	    {
	        echo "Error dropping database: " . mysql_error();
	    }
		
	/*create database if not exist*/
	if (mysql_query("CREATE DATABASE IF NOT EXISTS $data"))
	    {
	        echo "Database created";
	    }
	    else
	    {
	        echo "Error creating database: " . mysql_error();
	    }


	mysql_select_db($data);

	$file = $dump;

	SplitSQL($file, $delimiter = ';');

	echo "</div><br>";

	echo "creating username.....<br>";

	//echo "CREATE USER '$user'@'localhost' IDENTIFIED BY PASSWORD '$pass'";

	//echo "<br>";

	//echo "GRANT ALL PRIVILEGES ON `$data`.* TO $user@localhost WITH GRANT OPTION;";

	//echo "GRANT ALL PRIVILEGES ON  `jeffmant_kuvings` . * TO  'jeffmant_kuvings'@'localhost' WITH GRANT OPTION ;";
	//echo "GRANT ALL PRIVILEGES ON  `$data` . * TO  '$user'@'localhost' WITH GRANT OPTION ;";

	if(mysql_query("CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass'"))
		{
			echo "username created<br>";

		}
		else
		{
		echo mysql_error();

		}
	if(mysql_query("GRANT ALL PRIVILEGES ON  `$data` . * TO  '$user'@'localhost' WITH GRANT OPTION ;"))
		{
			echo "privileges granted<br>";

		}
		else
		{
		echo mysql_error();

		}

?>
<style type="text/css">
.css3button {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #ffffff;
	padding: 10px 20px;
	background: -moz-linear-gradient(
		top,
		#8c002a 0%,
		#c4003b 25%,
		#8c002a);
	background: -webkit-gradient(
		linear, left top, left bottom, 
		from(#8c002a),
		color-stop(0.25, #c4003b),
		to(#8c002a));
	-moz-border-radius: 30px;
	-webkit-border-radius: 30px;
	border-radius: 30px;
	border: 3px solid #ffffff;
	-moz-box-shadow:
		0px 3px 11px rgba(000,000,000,0.5),
		inset 0px 0px 1px rgba(082,000,025,1);
	-webkit-box-shadow:
		0px 3px 11px rgba(000,000,000,0.5),
		inset 0px 0px 1px rgba(082,000,025,1);
	box-shadow:
		0px 3px 11px rgba(000,000,000,0.5),
		inset 0px 0px 1px rgba(082,000,025,1);
	text-shadow:
		0px -1px 0px rgba(000,000,000,0.2),
		0px 1px 0px rgba(255,255,255,0.3);
}
</style>

<div style="clear:both; margin-top:50px;"></div>

<a href="srdb2.php" class="css3button">TAKE ME TO SEARCH replace database<a/> 

<div style="clear:both; margin-bottom:50px;"></div>

<?php 
}

//check for sql file and use that name.
$files = glob("*.sql");


?>


<h1>Whats going on?</h1>
<p>This script will create the database and username from wp-config file</p>


<form action="srdb1.php" method="POST">
	<p>
					<label for="dump">Mysql Filename:</label>
					<input  type="text" name="dump" id="dump" value="<?php echo $files[0] ?>" />
	</p>
	<input type="submit" name="submit" value="Submit" />
</form>
Blog  Support 