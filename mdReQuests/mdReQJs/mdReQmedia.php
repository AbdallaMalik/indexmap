<script>

    var cImcanvas;
    function mdIsPRPhoto(evt,id)
	{
		let md, mediaValidation, $mdFiles, cropperImageInitCanvas;
		    md   = $(id).attr("md");
			mdID = $(id).attr("id");
			
			$(".this_PHUPloadedImd").val(md);
			$("#mdsUPloadsmd").val(md);
			$('#thisPH_modalcroPs').modal('show');
            mediaValidation = validatePostMedia(evt.target.files);
        
		    cropperImageInitCanvas = document.getElementById('cropperImg');
		if(!mediaValidation)
		{
            $mdFiles = $("#"+mdID);
            $mdFiles.wrap('<form>').closest('form').get(0).reset();
            $mdFiles.unwrap();
            return false;
        }

        $('#mediaPreview').empty();
        $('.singleImageCanvasContainer').remove();
        if(cropperImageInitCanvas.cropper)
		{
            cropperImageInitCanvas.cropper.destroy();
            cropperImageInitCanvas.width = 0;
            cropperImageInitCanvas.height = 0;
			$(".thisCRPbtns> button").css({'display':'none'});
        }
		
        mdIsPRePhDzone(evt.target);
	}
	
	function mdIsPRePhDzone(input)
	{
		let galleryImagesContainer, mdsUPloadsmdKnd;
		    galleryImagesContainer = document.getElementById('galleryImages');
		var cropper;
        var img = [];
		
		mdsUPloadsmdKnd = $("#mdsUPloadsmdKnd").val();
        if (input.files.length) 
		{
            var i = 0;
            var index = 0;
            for (let singleFile of input.files) 
			{
                var reader = new FileReader();
                reader.onload = function(event) 
				{
                    var blobUrl = event.target.result;
                    img.push(new Image());
                    img[i].onload = function(e)
					{
                        // Canvas Container
                        var singleCanvasImageContainer = document.createElement('div');
                        singleCanvasImageContainer.id = 'singleImageCanvasContainer'+index;
                        singleCanvasImageContainer.className = 'singleImageCanvasContainer';
                        // Canvas Close Btn
                        var singleCanvasImageCloseBtn = document.createElement('button');
                        var singleCanvasImageCloseBtnText = document.createTextNode('X');
                        singleCanvasImageCloseBtn.id = 'singleImageCanvasCloseBtn'+index;
                        singleCanvasImageCloseBtn.className = 'singleImageCanvasCloseBtn';
                        singleCanvasImageCloseBtn.classList.add("btn", "btn-sm");
                        
						singleCanvasImageCloseBtn.onclick = function() 
						{ 
                            mdCanvasremove(this) 
                        };
						
                        singleCanvasImageCloseBtn.appendChild(singleCanvasImageCloseBtnText);
                        singleCanvasImageContainer.appendChild(singleCanvasImageCloseBtn);
                        // Image Canvas
                        var canvas = document.createElement('canvas');
                        canvas.id = 'imageCanvas'+index;
                        canvas.className = 'imageCanvas singleImageCanvas';
                        canvas.width  = e.currentTarget.width;
                        canvas.height = e.currentTarget.height;
                        canvas.onclick = function()
						{ 
						    $(".thisPH_modalbDG").removeClass("tmodalflXCPG");
						    
							setTimeout(function()
							{
								mdCroPInit(canvas.id); 
							},1000);
						};
						
                        singleCanvasImageContainer.appendChild(canvas)
                        // Canvas Context
                        var ctx = canvas.getContext('2d');
                        ctx.drawImage(e.currentTarget,0,0);
                        galleryImagesContainer.appendChild(singleCanvasImageContainer);
                        
						let mdsUPloadsmd = $("#mdsUPloadsmd").val();
						if(mdsUPloadsmd == "dFeatured" || mdsUPloadsmdKnd == "mdfeatured")
						while (document.querySelectorAll('.singleImageCanvas').length == input.files.length) 
						{
                            var allCanvasImages = document.querySelectorAll('.singleImageCanvas')[0].getAttribute('id');
                            
							$(".thisPH_modalbDG").removeClass("tmodalflXCPG");
							setTimeout(function()
							{
								mdCroPInit(allCanvasImages);
							},1000);
							
                            break;
                        };
						
                        mdCroPConversion();
                        index++;
                };
                    img[i].src = blobUrl;
                    i++;
                }
                reader.readAsDataURL(singleFile);
            }
        }
	}

	function mdCroPInit(selector) 
	{
		let cropperImageInitCanvas;
        
		    cImcanvas = document.getElementById(selector);
		    cropperImageInitCanvas = document.getElementById('cropperImg');

        if(cropperImageInitCanvas.cropper)
		{
            cropperImageInitCanvas.cropper.destroy();
        }
		
        var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
        for (let element of allCloseButtons) 
		{
            element.style.display = 'block';
        }
		
        cImcanvas.previousSibling.style.display = 'none';
		
        var ctx=cImcanvas.getContext('2d');
        var imgData=ctx.getImageData(0, 0, cImcanvas.width, cImcanvas.height);
        var image = cropperImageInitCanvas;
        image.width = cImcanvas.width;
        image.height = cImcanvas.height;
        var ctx = image.getContext('2d');
        ctx.putImageData(imgData,0,0);

        cropper = new Cropper(image, {
            aspectRatio: 9/9,
			viewMode: 0,
            preview: '.img-preview',
            crop: function(event) 
			{
				$(".thisCRPbtns> button").css({'display':'flex'});
            }
        });

    }

	function mdCroPsize() 
	{
		let cropperImageInitCanvas;
		
		cropperImageInitCanvas = document.getElementById('cropperImg');
        if(cropperImageInitCanvas.cropper)
		{
            var cropcanvas = cropperImageInitCanvas.cropper.getCroppedCanvas({
                    width: 400, height: 400
                });
            // document.getElementById('cropImages').appendChild(cropcanvas);
            var ctx=cropcanvas.getContext('2d');
            var imgData=ctx.getImageData(0, 0, cropcanvas.width, cropcanvas.height);
            // var image = document.getElementById(c);
            cImcanvas.width = cropcanvas.width;
            cImcanvas.height = cropcanvas.height;
            var ctx = cImcanvas.getContext('2d');
            ctx.putImageData(imgData,0,0);
            cropperImageInitCanvas.cropper.destroy();
            cropperImageInitCanvas.width = 0;
            cropperImageInitCanvas.height = 0;

			$(".thisCRPbtns> button").css({'display':'none'});
            var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
            for (let element of allCloseButtons) 
			{
                element.style.display = 'block';
            }
            mdCroPConversion();
        } 
		else 
		{
            alert('Please select any Image you want to crop');
        }
    }
	
	function mdCroPAction(id)
	{
		let md, cropperImageInitCanvas;
		
		    md = $(id).attr("md");

			if(md == "done")
			{
				mdCroPsize();
				$(".thisPH_modalbDG").addClass("tmodalflXCPG");
			}
			else if(md == "close")
			{
				cropperImageInitCanvas = document.getElementById('cropperImg');
				cropperImageInitCanvas.cropper.destroy();
                cropperImageInitCanvas.width = 0;
                cropperImageInitCanvas.height = 0;
			    $(".thisCRPbtns> button").css({'display':'none'});
                var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
                for (let element of allCloseButtons) 
			    {
                    element.style.display = 'block';
				}
				
				$(".thisPH_modalbDG").addClass("tmodalflXCPG");
			}
	}
	
    function mdCanvasremove(selector) 
	{
        selector.parentNode.remove();
        mdCroPConversion();
    }
    
	function mdCroPConversion() 
	{
        var allImageCanvas = document.querySelectorAll('.singleImageCanvas');
        var convertedUrl = '';
        canvasLength = allImageCanvas.length;
        for (let element of allImageCanvas) 
		{
            convertedUrl += element.toDataURL('image/jpeg');
            convertedUrl += 'img_url';
        }
		
        document.getElementById('post_img_data').value = convertedUrl;
    }
	
	function validatePostMedia(files)
	{

        $('#imageValidate').empty();
        let err = 0;
        let ResponseTxt = '';
        if(files.length > 10){
            err += 1;
            ResponseTxt += '<p> You can select maximum 10 files. </p>';
        }
        $(files).each(function(index, file) {
            if(file.size > 5048576){
                err +=  1;
                ResponseTxt += 'File : '+file.name + ' is greater than 1MB';
            }
        });

        if(err > 0){
            $('#imageValidate').html(ResponseTxt);
            return false;
        }
        return true;
        
    }

	function mdUPLoad(evt,id)
	{
		evt.preventDefault();
		
		let allImageCanvas, convertedUrl, canvasLength, mdFileReader, 
		    mdIndex, mdCnavas, thisURL, thisFile, mdIndexID, thisFiles;
		
		    thisFiles = [];
		    allImageCanvas = document.querySelectorAll('.singleImageCanvas');
            convertedUrl = '';
            canvasLength = allImageCanvas.length;

			mdIndex = 0;
			
			thisFiless = "";
			$("canvas.singleImageCanvas").each(function(e)
			{
				mdIndexID = $(this).attr("id");
				mdCnavas = document.getElementById(mdIndexID);
				
				if(mdCnavas != "")
				mdCnavas.toBlob(function(blob)
		        {
					mdIndex++;
			        thisURL = URL.createObjectURL(blob);
			        thisReader = new FileReader();
			        thisReader.readAsDataURL(blob);
					
					thisReader.onloadend = function()
					{
						thisFile = thisReader.result;
						
						thisFiles.push(thisFile);
						if(mdIndex == canvasLength)
						{
							mdUPLoads(thisFiles);
						}
					};
				});
			});
	}
	
	function mdUPLoads(thisFile)
	{
		let dfAction, dfKNd, mYDroPURL, md,
		    mdsUPsmd, mdsUPloadsmdKnd;
		
		    mdsUPKnd = $("#mdsUPloadsmdKnd").val();
		if(thisFile != "")
		{
			mdsUPsmd  = $("#mdsUPloadsmd").val();
			dfAction  = "mdCROPeDzone";
			dfKNd     = "mdCROPe";
			md        = $(".this_PHUPloadedImd").val();
		    mYDroPURL = "<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php";
			
			$.ajax({
				url:mYDroPURL,
				method:'POST',
				data:{image:thisFile, dfAction:dfAction, 
				      dfKNd:dfKNd, md:md},
				beforeSend:function()
				{
					$(".thisPH_modalfG").addClass("mdNOcursor");
					$(".thisPHmodalPROms").show("slow");
					$(".thisPHmodalPROms").html("UPLOADING...");
				},
				success:function(mdResults)
				{
					mdResult = mdResults.split("|");
					
					console.log("<br> Results:"+mdResult[2]);
					if(mdResult[0] == 1)
					{
						if(mdsUPsmd == "mdPROPiims")
						{
							$("#mdsUPloadsVALUes").val(mdResult[2]);
							setTimeout(function()
							{
								if(mdsUPKnd != "mdfeatured")
								    $(".mdPROPimlist").html("");
								
								mdPROPiUPims();
							},500);
						}
						else if(md == "dzone")
						    $(".this_PHUPloadedIms").val(mdResult[2]);
						else if(md == "dFeatured") 
						    $(".this_PHUPloadedIfm").val(mdResult[2]);
						
						$(".mdUPcroPclose").click();
					}
					
					$(".thisPH_modalfG").removeClass("mdNOcursor");
					$(".thisPHmodalPROms").hide("slow");
					$(".thisPHmodalPROms").html("");
				}
			});
		}	  
	}

	function mdUPdone(evt)
	{
		evt.preventDefault();
		$("#thisPH_modalcroPs").modal("hide");
            
        $('.mdUPLoadfiles').val("");
		$('#post_img_data').val('');
    }

	function mdIniteTHISmaP()
	{
		let $mdCRmaPID , mdCRmaP;
		let mdCroPmaPsInite;
		
		    mdPmaPsInite = document.getElementById("mdCroPmaPsInite");
		    $mdCRmaPID = document.getElementById("mdCroPmaPs");
			
	    mdCRmaP = new L.Map('mdCroPmaPs', {
            center: astCenter,
            zoom: 10,
		    watch:true,
		    fadeAnimation:true,
		    zoomAnimation:true,
            layers: [dfstWEBLAYER,newUser]
		});  
    
        overlayMaps = {
            "location": newUser
		};

        L.control.layers(baseMaps, overlayMaps).addTo(mdCRmaP);

        function geoLocate() 
	    {
            mdCRmaP.locate({setView: true, maxZoom: 17});
		}
		
		geolocControl.onAdd = function (mdCRmaP)
		{
            let div = L.DomUtil.create('div', 'leaflet-control-zoom leaflet-control');
            div.innerHTML = '<a  class="leaflet-control-geoloc" href="#" onclick="geoLocate(); return false;" title="My location"><span class="fa fa-map-marker"></span></a>';
            return div;
		};
		
		mdCRmaP.addControl(geolocControl);
        mdCRmaP.addControl(new L.Control.Scale());
		
	 
	    mdPmaPsInite.addEventListener('click',function(e)
		{
			let maClass;
			    if($(this).hasClass("start"))
				{
					$(this).removeClass("start");
					$(this).find("i").removeClass("fa-lock");
					$(this).find("i").addClass("fa-unlock");
					
					mdCRmaP.addEventListener('click', mdCRmaPclick);
                    $("#mdCroPmaPs").css('cursor', 'crosshair');
				}
				else
				{
					$(this).addClass("start");
					$(this).find("i").removeClass("fa-unlock");
					$(this).find("i").addClass("fa-lock");
					
					//newUser.clearLayers();
                    $("#mdCroPmaPs").css('cursor', '');
                    mdCRmaP.removeEventListener('click', mdCRmaPclick);
					
				}
				
		});
	}
	
	function mdCRmaPclick(e)
	{
		let mdLOcation, mdMarker, mdLAT, mdLNG;
		
		    newUser.clearLayers();
            mdLOcation = new L.LatLng(e.latlng.lat, e.latlng.lng);
            mdMarker = new L.Marker(mdLOcation);
            newUser.addLayer(mdMarker);
			
		   mdLAT = e.latlng.lat.toFixed(6);
		   mdLNG = e.latlng.lng.toFixed(6);
		   
		   $(".mdInLAT").val(mdLAT);
		   $(".mdInLNG").val(mdLNG);
		   
	}
	
	function mdSHOWPROs(id)
	{
		let tfm, tmd, tmodal;
		    
			tfm    = $(id).attr("fm");
			tmd    = $(id).attr("md");
			tmodal = $(id).attr("modal");
			
			if(tfm == "modalHTML")
			{
				mdPROPGmodal(tmodal);
				mdPROPGmodalHTML(id);
			}
			else if(tfm == "modalPHP")
			{
				mdPROPGmodalPHP(id);
			}
			
	}
	
	function mdPROPGmodalHTML(id)
	{
		let tfm, tmd, tmID, tmodal, tmdURL, mdRLoads;
		    
			tfm      = $(id).attr("fm");
			tmd      = $(id).attr("md");
			tmodal   = $(id).attr("modal");
			tmdURL   = "<?php echo $smPATH;?>mdReQuests/mdReQhtml/modalHTML.php";
			mdRLoads = "";
			tmID     = "";
			if(tmd == "mdPROPiims")
			{
				tmID = $(id).attr("id");
				$("#mdsUPloadsID").val(tmID);
			}
			
			$.ajax({
				url:tmdURL,
				method:'POST',
				data:{tfm:tfm,tmd:tmd,tmodal:tmodal,
				      tmID:tmID},
				beforeSend:function()
				{
					$("#"+tmodal+"> div.mdPROPcontent").html(mdRLoads);
				},
				success:function(mdResult)
				{
					$("#"+tmodal+"> div.mdPROPcontent").html(mdResult);
					if(tmd == "mdPROPiims")
					{
						$("#tmOFFsetmodals").val(0);
						$(".mdPROPimlist").html("");
						mdPROPlist("modalHTML","mdPROPimlist",tmodal);
					}
					else
					{
						$("#tmOFFsetmodal").val(0);
						mdPROPlist(tfm,tmd,tmodal);
					}
					
				}
			});	
	}
	
	function mdPROPlist(tfm,tmd,tmodal)
	{ 
		let tmdURL, mdRLoads, tmOFFset, tmROWs, tmID;
		    
			tmdURL   = "<?php echo $smPATH;?>mdReQuests/mdReQhtml/modalHTML.php";
			mdRLoads = "";
            tmID     = "";
			
			$mdProlist = "";
			if(tmd == "mdProlist")
			{
				$mdProlist = $(".mdProlist");
				tmd        = "mdPROPlist";
				tmOFFset   = $("#tmOFFsetmodal").val();
			    tmROWs     = $("#tmROWsmodal").val();
			}
			else
			{
				tmOFFset = $("#tmOFFsetmodals").val();
			    tmROWs   = $("#tmROWsmodals").val();
				tmID     = $("#mdsUPloadsID").val();
				$mdProlist = $(".mdPROPimlist");
			}
			   
			tmOFFset++;
			$.ajax({
				url:tmdURL,
				method:'POST',
				data:{tfm:tfm,tmd:tmd,tmodal:tmodal,
				      tmOFFset:tmOFFset,tmROWs:tmROWs,
					  tmID:tmID},
				beforeSend:function()
				{
					
				},
				success:function(mdResult)
				{
					$mdProlist.append(mdResult);
					if(tmd == "mdPROPlist")
						$("#tmOFFsetmodal").val(tmOFFset);  
					else 
						$("#tmOFFsetmodals").val(tmOFFset);
				}
			});	
	}
	
	function mdPROPGmodalPHP(id)
	{
		let tfm, tmd, tmID, tmodal, 
		    tmdURL, mdRLoads, tmdact;
		    
			tfm      = $(id).attr("fm");
			tmd      = $(id).attr("md");
			tmodal   = $(id).attr("modal");
			tmdURL   = "<?php echo $smPATH;?>mdReQuests/mdReQPHP/modalPHP.php";
			mdRLoads = "";
			tmID     = "";
			tmdact   = "";
			
			if(tmd == "mdPROPiims")
			{
				tmID   = $(id).attr("id");
				tmdact = $(id).attr("mdact");
			}
			
			
			if(tmdact == "expand")
			{
				
			}
			else
			$.ajax({
				url:tmdURL,
				method:'POST',
				data:{tfm:tfm,tmd:tmd,tmodal:tmodal,
				      tmID:tmID,tmdact:tmdact},
				beforeSend:function()
				{
					$("#mdPROPitems"+tmID).addClass("mdNOcursor");
				},
				success:function(mdResult)
				{
					mdResults = mdResult.split("|");
					$("#mdPROPitems"+tmID).removeClass("mdNOcursor");
					if(mdResults[0] == 1)
					{
						mdsucessBOXs(mdResults[1],"alert-success");
						if(tmd == "mdPROPiims")
						{
							if(tmdact == "remove")
							{
								$("#mdPROPitems"+tmID).remove();
							}
						}
					}
					else
					{
						mdsucessBOXs(mdResults[1],"alert-danger");
					}
				}
			});	
	}
	
	function mdPROPiims(evt,id)
	{
		let md, mediaValidation, $mdFiles, 
		    cropperImageInitCanvas, 
			tfm, mdID,tmID , mdact, mdKnd;
			
		    tfm   = $(id).attr("fm");
			md    = $(id).attr("md");
			mdID  = $(id).attr("id");
			tmID  = $(id).attr("tmID");
			mdact = $(id).attr("mdact");
			mdKnd = $(id).attr("mdKnd"); 
			
			$("#mdsUPloadsfm").val(tfm)
			$("#mdsUPloadsID").val(tmID);
			$("#mdsUPloadsmd").val(md);
			$("#mdsUPloadsmdact").val(mdact);
            $("#mdsUPloadsVALUes").val("");
			$("#mdsUPloadsmdKnd").val(mdKnd);
			
			$("#thisPH_modalcroPs").css({'z-index':'9999902'});
			$('#thisPH_modalcroPs').modal('show');
            mediaValidation = validatePostMedia(evt.target.files);
        
		    cropperImageInitCanvas = document.getElementById('cropperImg');
		if(!mediaValidation)
		{
            $mdFiles = $("#"+mdID);
            $mdFiles.wrap('<form>').closest('form').get(0).reset();
            $mdFiles.unwrap();
            return false;
        }

        $('#mediaPreview').empty();
        $('.singleImageCanvasContainer').remove();
        if(cropperImageInitCanvas.cropper)
		{
            cropperImageInitCanvas.cropper.destroy();
            cropperImageInitCanvas.width = 0;
            cropperImageInitCanvas.height = 0;
			$(".thisCRPbtns> button").css({'display':'none'});
        }
		
        mdIsPRePhDzone(evt.target);
	}
	
	function mdPROPiUPims()
	{
		let tfm, tmd, tmID, tmodal, 
		    tmdURL, mdRLoads, tmdact, tmdVALUe;
		    
			tfm      = $("#mdsUPloadsfm").val();
			tmd      = $("#mdsUPloadsmd").val();
			tmodal   = "";
			tmdURL   = "<?php echo $smPATH;?>mdReQuests/mdReQPHP/modalPHP.php";
			mdRLoads = "";
			tmID     = "";
			tmdact   = "";
			tmdVALUe = "";
			smdVALUe = "";
			
			if(tmd == "mdPROPiims")
			{
				tmID     = $("#mdsUPloadsID").val();
			    tmdact   = $("#mdsUPloadsmdact").val();
				tmdVALUe = $("#mdsUPloadsVALUes").val();
			}

			if(tmdact == "expand")
			{
				
			}
			else
			$.ajax({
				url:tmdURL,
				method:'POST',
				data:{tfm:tfm,tmd:tmd,tmodal:tmodal,
				      tmID:tmID,tmdact:tmdact,tmdVALUe:tmdVALUe},
				beforeSend:function()
				{
					//$(".mdPROPimlist").addClass("mdNOcursor");
				},
				success:function(mdResult)
				{
					mdResults = mdResult.split("|");
					//$(".mdPROPimlist").removeClass("mdNOcursor");
					if(mdResults[0] == 1)
					{
						mdsucessBOXs(mdResults[1],"alert-success");
						if(tmd == "mdPROPiims")
						{
							if(tmdact == "remove")
							{
								$("#mdPROPitems"+tmID).remove();
							}
							else if(tmdact == "add")
							{
								$("#tmOFFsetmodals").val(0);
								$(".mdPROPimlist").html("");
								mdPROPlist("modalHTML","mdPROPimlist",tmodal);
							}
							else if(tmdact == "edt")
							{
								smdVALUe = '<?php echo $smURLPARENt;?>'+mdResults[4];
								
								$("#mdPROPitems"+mdResults[3]+" img.mdImRURL").attr("src",smdVALUe);
								$("#mdPROPiPtems"+mdResults[2]+" img").attr("src",smdVALUe);
								
								$("#mdsUPloadsmdKnd").val("");
							}
						}
					}
					else
					{
						mdsucessBOXs(mdResults[1],"alert-danger");
					}
				}
			});		
	}
	
	function mdPROPclose(id)
	{
		let tmodal;
		    tmodal = $(id).attr("modal");
			if(tmodal == "thisPH_modalcroPs")
			{
				$("#thisPH_modalcroPs").css({'z-index':'999902'});
			}
			else
			{
				mdPROPGmodal(tmodal);
			}
			
	}
	
	function mditLOADmore(id)
	{
		let tfm, tmd, tmodal, tKind, mdtotals, tmID;
		    tfm    = $(id).attr("tfm");
			tmd    = $(id).attr("tmd");
			tmodal = $(id).attr("tmodal");
			tKind  = $(id).attr("tKind");
			tmID   = $(id).attr("tmID");
			
			
			if(tKind == "items")
			{
				mdtotals = $("#mdITEMStotals").val();
				tmOFFset   = $("#tmOFFsetmodal").val();
			    tmROWs     = $("#tmROWsmodal").val();
				
				mdPROPlist(tfm,tmd,tmodal);
			}
			else if(tKind == "images")
			{
				mdtotals = $("#mdIMAGEStotals").val();
				tmOFFset = $("#tmOFFsetmodals").val();
			    tmROWs   = $("#tmROWsmodals").val();
				$("#mdsUPloadsID").val(tmID);
				
				mdPROPlist("modalHTML","mdPROPimlist",tmodal);
			}
	
			
	}
	
	function mdPROPGmodal(tmodal)
	{
		if($("#"+tmodal).hasClass("mdPROGleft"))
		{
			$("#"+tmodal).removeClass("mdPROGleft");
		}
		else
		{
			$("."+tmodal).removeClass("mdPROGleft");
			$("#"+tmodal).addClass("mdPROGleft");
		}
	}
</script>

