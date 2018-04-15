<html>
 <head>
 	<title></title>
 	<!-- Bootstrap 3.3.4 -->
	{{HTML::style('AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css')}}
	<link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	<!-- modernizr enables HTML5 elements and feature detects -->
	{{HTML::script('/userCss/js/modernizr-1.5.min.js')}}
 </head>
 <body>
 	{{ Form::open(array('url'=>'hasil/', 'method'=>'POST')) }}
    {{ Form::text('auto', $value=null,array('placeholder'=>'Please type a word', 'id'=>'auto'))}}
    {{ Form::submit('Submit') }}
    {{ Form::close() }}
    {{HTML::script('/userCss/js/jquery-2.1.1.min.js')}}
    <!-- Bootstrap 3.3.2 JS -->
	{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
    {{HTML::script('/userCss/js/jquery-ui.js')}}
    <!-- 2: Autocomplete script sends POST request to the source (getdata route) using word term in the query string -->
    <script type="text/javascript">
    $(document).ready(function(){
    	$('input:text').bind({});
    	$("#auto").autocomplete({
    		minLength:3,
    		autoFocus:true,
    		source:'{{URL('getdata')}}'
    	});
    });
	</script>
 </body>
 </html>