
<style>
#graphCanvas{
	max-width:100% !important;
	border:1px solid #ddd;
	width:100%;
	display:flex !important;
	justify-content:center !important;
	align-items:center !important;
}
.defSDLinkPARentss{
	position:relative;
	height:100%;
	width:100%;
}
.defSDLinkPARents{
    position:relative;
	justify-content:space-between;
	flex-flow:column;
	gap:15px;
	max-width:100%;
	padding-bottom:50px;
	padding-top:30px;
}
.defSDLinkPARents .defSDLinkson{
	border:1px solid #eee;
	border-radius:3px;
	gap:5px;
	flex:1;
	justify-content:space-between;
	flex-flow:wrap;
	background-color:#fff;
	width:100%;
	position:relative;
	padding:15px;
}
.defSDLinkPARents .defSDLinkson.defSDLinktss .defSDLinksonBODY{
	flex-flow:wrap row !important;
	gap:5px;
	justify-content:space-between;
}
.defSDLinkson .defSDLnk.btn{
	gap:5px;
	height:40px;
	flex-flow:column;
	padding:10px;
	border:0px solid #eee;
	border-top:1px solid #eee;
	outline:0px;
	flex:1;
}
.defSDLinkson .defSDLnk.btn.stss{
	height:70px;
	flex:calc(90% / 3);
}
.defSDLinkson .defSDLnk b,
.defSDLinkson .defSDLnk span{
	flex:1;
}
.defSDLinkson .defSDLnk b{;

}
.defSDLinkPARents .defSDLinkson.defSDLinktss .defSDLinksonBODY .defSDLnk{
	flex:initial;
	padding:0px 10px;
	height:40px;
	align-items:center !important;
	justify-content:center !important;
}
.defSDLinkPARents .defSDLinkson.defSDLinktss .defSDLinksonBODY .defSDLnk b{
	flex:initial;
}
.defSDLinksonHdr{
	border-bottom:1px solid #eee;
	height:50px;
	padding:5px 15px;
	margin-bottom:5px;
}
.defSDLinksonHdr h3{
	padding:0px;
}
.defTOPGraPhCanvas{
	width:100%;
}
.defHEATGraPhCanvas{
	width:100%;
	height:450px;
}
.defHEATGraPhCanvasPROG{
	position:absolute;
	top:0;
	left:0;
	bottom:0;
	right:0;
	background-color:rgba(0,0,0,0.5);
}
@media (max-width:767px)
{
	
}

</style>


    <input type="hidden" id="astInCountrYes">
	<input type="hidden" id="astInCountrYesFM" value="InCountry">
	<input type="hidden" id="astInCitYesFM" value="">
<script>

	//////////////////////////////////////
	function astMOReIMAPsTAs()
	{
		let astMLOADer = astMOReLOADer("LOADING...");
		$("#astMOReIMAPsTALOAD").html("");
		let fm = "OpenSDe";
		let tOaction = "stFIRST";
		$.ajax({
			url:'<?php echo $smPATH;?>n_map/realDataJson.php?stFMs=astMOReIMAPsTAs',
			method:'POST',
			data:{fm:fm,tOaction:tOaction},
			beforeSend:function()
			{
				$("#astMOReIMAPsTALOAD").html(astMLOADer);
			},
			success:function(res)
			{
				$("#astMOReIMAPsTALOAD").html(res);
				astMOReIMAPsGraPh();
			}
		});
		
	}
	
	function astMOReIMAPsGraPh()
	{
        let fm = "loadGraPH";
		let tOaction = "stFIRST";
		let astInCountrYes  = $("#astInCountrYes").val();
		let astInCountrYefs = $("#astInCountrYesFM").val();
		
		let defGraphCanvas = ""
		 
		$.ajax({
			url:'<?php echo $smPATH;?>n_map/realDataJson.php?stFMs=astMOReIMAPsTAs',
			method:'POST',
			dataType:'JSON',
		    data:{fm:fm,tOaction:tOaction,
			      astInCountrYes:astInCountrYes,astInCountrYefs:astInCountrYefs},
			beforeSend:function()
			{
				defGraphCanvas = '<canvas class="astFlex" id="graphCanvas"></canvas>';
		        $("#defGraphCanvas").html("LOADING");
		        $("#defGraphCanvas").html(defGraphCanvas);		
			},
			success:function(data)
			{
				defGraPhCnvs(data,"graphCanvas","TOP INDEX");	
			}
		});	
			
		defSDLinkst();
		defTOPGraPhCanvas();
		HEAtMaPLOaD();
		
	}
	
	function defTOPGraPhCanvas()
	{
		
        let fm = "loadGraPH";
		let tOaction = "stTOPRIces";
		let astInCountrYes  = $("#astInCountrYes").val();
		let astInCountrYefs = $("#astInCountrYesFM").val();
		
		let defGraphCanvas = ""
		 
		$.ajax({
			url:'<?php echo $smPATH;?>n_map/realDataJson.php?stFMs=astMOReIMAPsTAs',
			method:'POST',
			dataType:'JSON',
		    data:{fm:fm,tOaction:tOaction,
			      astInCountrYes:astInCountrYes,astInCountrYefs:astInCountrYefs},
			beforeSend:function()
			{
				defGraphCanvas = '<canvas class="astFlex" id="defTOPGraPhCanvas"></canvas>';
		        $(".defTOPGraPhCanvas").html("LOADING");
		        $(".defTOPGraPhCanvas").html(defGraphCanvas);		
			},
			success:function(data)
			{	
				defGraPhCnvs(data,"defTOPGraPhCanvas","TOP PRICES");		
			}
		});	
		
	}
	
	function defGraPhCnvs($data,defTOPGraPhCanvas,defTITLe)
	{
		let chartdata,graphTarget,barGraph,
		    Country = [],marks = [],defSDLinks ="",
			astInCountrYes,astInCountrYefs;
		
		    astInCountrYes  = $("#astInCountrYes").val();
		    astInCountrYefs = $("#astInCountrYesFM").val();
		
		for (var i in $data) 
		{
			if(astInCountrYes == "")
			{
				Country.push($data[i].InCountry);
			}
			else if(astInCountrYes == "InCountry")
		    {
				Country.push($data[i].InCity);
			}
			else if(astInCountrYes == "InCity")
			{
				Country.push($data[i].InArea);
			}
			else
			{
				Country.push($data[i].InCountry);
			}
                    
            marks.push($data[i].marks);	
		}
					
		chartdata = {
            labels: Country,
            datasets: [
                    {
                        label: defTITLe,
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: marks
					}
                ]	
		};
					
		graphTarget = $("#"+defTOPGraPhCanvas);

        barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
		});	
		
	}
	
	function defSDLinkst()
	{
		
		let fm       = "loadGraPH";
		let tOaction = "defSDLinkst";
		let astInCountrYes  = $("#astInCountrYes").val();
		let astInCountrYefs = $("#astInCountrYesFM").val();

		$.ajax({
			url:'<?php echo $smPATH;?>n_map/realDataJson.php?stFMs=astMOReIMAPsTAs',
			method:'POST',
			data:{astInCountrYes:astInCountrYes,
			      astInCountrYefs:astInCountrYefs,
				  fm:fm,tOaction:tOaction},
			beforeSend:function()
			{
				$("#defSDLinkstssss").html("LOADING");			
			},
			success:function(res)
			{
				
				$("#defSDLinkstssss").html(res);				
			}
		});
		
	}
	
	
	function defSDLinks(id)
	{
		let fm   = $(id).attr("fm");
		let fmId = $(id).attr("id");
		
					$("#astInCountrYes").val(fm);
		if(fm == "InCity")
		{
			$("#astInCitYesFM").val(fmId);
		}
		else
		{
			$("#astInCountrYesFM").val(fmId);
		}
		
		
		astMOReIMAPsGraPh();
		
		$(".defSDLinksonBODY> .defSDLnk").removeClass("active");
		$(id).addClass("active");
		
	}

	
	
</script>