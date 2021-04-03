<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/reset.css">
	<!--<link rel="stylesheet" href="css/estilos.css"> -->
	<link rel="stylesheet" href="css/machine.css">
	<link rel="stylesheet" href="css/mobile.css" media="(max-width: 939px)">
	<!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	<script type="text/javascript" src="Agent.js"></script>
	<script type="text/javascript" src="DataItem.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>
	<link rel="stylesheet" href="DataItem.css"/>
	<script type="text/javascript">
			$(document).ready(function(){
				
				
				$('body').load(function(){
					var options = {
					    proxy: "localhost/WSS/proxy.php?url=",
						url: "http://agent.mtconnect.org",
						interval:  1000
					};
				
					var agent = new Agent(options); //Criou uma objeto do tipo agent
					var $agent = $(agent); //converteu esse objeto como um elemento jquery
					$agent.bind('devices', function(e, doc){
						Agent.dataItems(doc).each(function(){ //Percorre uma lista de DataItem
							var $this = $(this); //this = dataitem
							var name = $this.attr('name') || $this.attr('id');
							
							$("table").find("span").each(function(index, element){

								var $elemento = $(element);
								if($elemento.attr("id") == name){
                                   $('<span></span>').DataItem('init',element).appendTo("#"+ $elemento.attr("id").toString());
                                   
								}

							});
							//Chama o metodo DataItem para controlar a exibição das caixas de valores na tela, envia o dataItem para ser tratado antes de adiciona-lo a lista <ul>
							//$('<li></li>').DataItem('init', this).appendTo('#dataItems'); //this = Dataitem
						});
					})
					.bind('streams', function(e, doc){
						Agent.dataItems(doc).each(function(){ //Percorre uma lista de DataItem
							var $this = $(this); 
							var $ids = $("table").find("span");
							//pega o valor do parametro dataItemId do dataitem
							
							$ids.each(function(index, element){

								var diID = $this.attr('dataItemId');
								var $elemento = $(element);
								if($elemento.attr("id") == diID){
                                 var $elem = $('id ="' + diID + '"]');
							         $elem.DataItem('update', this);
							         break; //atualiza o DataItem de Id marcado
						    }
						  });
						});

						//Atualiza o elemento <span> com a hora da ultima atualização
						//$('#lastUpdate').text(Agent.creationTime(doc)); 
					})
					.bind('errors', function(e, doc){//Se houver algum erro, exibe em uma caixa de dialogo
						console.log(doc);
						$('<div></div>')
							.text( $(doc).find('Error').text() )
							.dialog({
								appendTo: 'body',
								modal: true
							})
						;
					});
					agent.monitor();
					
					
				});

			});

		</script>
  </head>
  <body>
 <div class="conteudo">
 <div id="program" class="detalhes">
   <div>
   <table>
			<tr>
			  <th>Program</th>
			  <th>Block</th>
			</tr>
			<tr>
			  <td><span id="cn5"> </span></td>
			  <td><span id="cn2"> </span> </td>
			</tr>
    </table>
	</div>
	<div>
   <table>
			<tr>
			  <td>X Load (%)</td>
			  <td> <span id="n3"> </span></td>
			</tr>
			<tr>
			  <td>Z Load (%)</td>
			  <td> <span id="z4"> </span></td>
			</tr>
			<tr>
			  <td>C Load (%)</td>
			  <td> <span id="cl3"> </span></td>
			</tr>
    </table>
  </div>
 </div>
 <div>
    <table>
			<tr>
			  <th>Axis</th>
			  <th>Actual Position/Sspeed</th>
			  <th>Commanded Position/Sover</th>
			</tr>
			<tr>
			  <td>X (mm)</td>
			  <td><span id="x2"> </span></td>
			  <td><span id="x3"> </span></td>
			</tr>
			<tr>
			  <td>Z(mm)</td>
			  <td>-<span id="z2"> </span></td>
			  <td><span id = "z3"> </span></td>
			</tr>
			<tr>
			  <td>C(Sspeed/Sover)</td>
			  <td><span id="c2"> </span></td>
			  <td><span id="c3"> </span></td>
			</tr>
    </table>
 </div>
 <div>
     <table>
          <tr>
			  <td>Actual Path Feedrate (mm/s):</td>
			  <td><span id="Frt"> </span></td>
			</tr>
			<tr>
			  <td>Path Feedhate Override(mm/s):</td>
			  <td><span id="Fovr"> </span></td>
			</tr>
			<tr>
			  <td>Axis Override(%):</td>
			  <td>100</td>
			  <td></td>
			</tr>
	 </table>
 </div>
 </div>
  </body>
</html>