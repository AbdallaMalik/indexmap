<script>
    let searchMOBs = false;	
    $(document).ready(function(e)
	{	
        
		$(".mdFXDcontainer input.mdMAPsearchVALUe").on("clear, blur, keyup", function()
		{
			if($(this).val() == "")
			{
				$(".mdclear.mdMAPsearchLst").addClass("astDnone");
			}
		});
		
		
	});
	
	function mdSPricePMTsVLUs(mdfm)
	{
		let mdSPricPMTsVLUs, mdSPrices, mdMINPrice, mdMAXPrice, mdReTURnPrice;
		
		    mdReTURnPrice = "";
			mdMINPrice    = "";
			mdMAXPrice    = "";
			
		    mdSPricPMTsVLUs = $(".intsrSPricPMTsVLUes").val();
		    
			if(mdSPricPMTsVLUs != "" && mdSPricPMTsVLUs != ",")
			{
				mdSPrices = mdSPricPMTsVLUs.split(",");
			
			    mdMINPrice = mdSPrices[0];
			    mdMAXPrice = mdSPrices[1];
			}
			
			
		if(mdfm == "min")
		{
			mdReTURnPrice = mdMINPrice;
		}
        else if(mdfm == "max")
		{
			mdReTURnPrice = mdMAXPrice;
		}	

        return mdReTURnPrice;	
	}
	
	function defMAPLOAD(dfAction)
	{
		let dfCountries, dfCities, fDistricts, dfArea, dfAddress, dfProName,
		    defGeTzOooOm ,intsrSROsaleVLUes,intsrSResDNeVLUes,intsrSBedsVLUes,intsrSBthsVLUes,
			intsrSPricesVLUes,intsrSAreasVLUes, astmnPrice, astmxPrice, distPri, currency, currencsYmbol,
			defSEARCHMAP, defSEARCHNme, defSENRCHNme, mYLaT, mYLnG, maPSHAReD, defMAP, defFILTErs;
			
		    distPri       = $(".mdMAPsSizeVLUe").val();
		    astmnPrice    = mdSPricePMTsVLUs("min");
		    astmxPrice    = mdSPricePMTsVLUs("max");
            currency      = $(".mdMAPscurrencYVLUe").val();		
		    currencsYmbol = $(".mdMAPscurrencY").val(); 
			
	        defSEARCHMAP  = $(".mdMAPssearchBOx").val();
		    defSEARCHNme  = mdSTRNGRePlAce(defSEARCHMAP,"add");
            defSENRCHNme  = mdSTRNGRePlAce(defSEARCHMAP,"remove");	
		
		    mYLaT         = $("#maPSHAReLaT").val();
		    mYLnG         = $("#maPSHAReLnG").val();
		    maPSHAReD     = $("#maPSHAReID").val();
		    defMAP        = $("#defaultMAP").val();
		    defFILTErs    = $("#defFILTErs").val();
		
		    dfCountries   = $(".mdMAPscountries").val();
		    dfCities      = $(".mdMAPscities").val();
			fDistricts    = $(".mdMAPsdistrict").val();
		    dfArea        = $(".mdMAPsareas").val();
			dfAddress     = $(".mdMAPsbuilds").val();
			dfProName     = $(".mdMAPsPname").val();
			
			dfCountries   = mdSTRNGRePlAce(dfCountries,"remove");
			dfCities      = mdSTRNGRePlAce(dfCities,"remove");
			fDistricts    = mdSTRNGRePlAce(fDistricts,"remove");
			dfArea        = mdSTRNGRePlAce(dfArea,"remove");
			dfAddress     = mdSTRNGRePlAce(dfAddress,"remove");
			dfProName     = mdSTRNGRePlAce(dfProName,"remove");
			
			defGeTzOooOm  = $("#defGeTzOooOm").val();
			
			intsrSROsaleVLUes  = $(".intsrSROsaleVLUes").val();
			intsrSResDNeVLUes  = $(".intsrSResDNeVLUes").val();
			intsrSBedsVLUes    = $(".intsrSBedsVLUes").val();
			intsrSBthsVLUes    = $(".intsrSBthsVLUes").val();
			intsrSPricesVLUes  = $(".intsrSPricesVLUes").val();
			intsrSAreasVLUes   = $(".intsrSAreasVLUes").val();
			
		if(dfAction == "default" || dfAction == "dfLoINFOs" || dfAction == "indexDetails")	
		$.ajax({
			url:'<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php',
		    method:'POST',
			data:{dfAction:dfAction, dfCountries:dfCountries,
			      distPri:distPri, currency:currency, defSEARCHMAP:defSENRCHNme,
				  currencsYmbol:currencsYmbol, mYLaT:mYLaT,mYLnG:mYLnG, maPSHAReD:maPSHAReD, defMAP:defMAP,
				  astmnPrice:astmnPrice, astmxPrice:astmxPrice, dfCities:dfCities, dfArea:dfArea, 
				  fDistricts:fDistricts, dfAddress:dfAddress, dfProName:dfProName, defGeTzOooOm:defGeTzOooOm,
				  intsrSROsaleVLUes:intsrSROsaleVLUes, intsrSResDNeVLUes:intsrSResDNeVLUes,
				  intsrSBedsVLUes:intsrSBedsVLUes,intsrSBthsVLUes:intsrSBthsVLUes,
			      intsrSPricesVLUes:intsrSPricesVLUes,intsrSAreasVLUes:intsrSAreasVLUes},
			dataType:'JSON',
			beforeSend:function()
			{
				if(dfAction == "default")
				{
					autoLOADmss(1,dfCountries);
			        aststHEADURls(1);
				    astdefURLOGo();
				}
				else
				{
					aststHEADURls("");
					if(dfAction == "indexDetails")
					{
						$(".astDTBLeOFBODYs").html("<b>LOADING INDEXS.</b>");
						$(".astDTBLeOFBODYs").css({'opacity':'0.7'});
					}
				}
			},
			success:function(data)
			{ 
			   
			    if(data != "")
				{
					if(dfAction == "default")	
				    {
					    mdDeFAuLtLoAds(data);
					}
				    else if(dfAction == "dfLoINFOs")
				    {
					    dfLocationINFOss(data);
					}
				    else if(dfAction == "indexDetails")
				    {
					    mdLOADInDxDetails(data); 
					}
				}
				else
				{
					$("#error-msg").fadeIn("slow").text("No Data Found ....");
					setTimeout(function(){
				        autoLOADmss(0,"");
					},2000);
				}
				
				
				defhEADeRsLst();
				aststHEADURls("");
				
			}
		}); 
		else if(dfAction == "mdTBLe")
		{
			
		}
	}
	
	function mdDeFAuLtLoAds(data)
	{
		let dfCountries, defMAP, distPri, currencsYmbol, defFILTErs; 
		
		    dfCountries   = $(".mdMAPscountries").val();
			dfCountries   = mdSTRNGRePlAce(dfCountries,"remove");
			defMAP        = $("#defaultMAP").val();
			distPri       = $(".mdMAPsSizeVLUe").val();
			currencsYmbol = $(".mdMAPscurrencY").val();
			defFILTErs    = $("#defFILTErs").val();
		    searchList.clearLayers();
		    users.clearLayers();
		
		if(data !="")
		{
			
			for (var i = 0; i < data.length; i++) 
			{
				let location,avGInPrice ,avGInPricePFT ,avGInPricePMT,mInPrice,mInPricePFT,mInPricePMT,
					xInPrice,xInPricePFT,xInPricePMT,GNo,asGLat,InCountry,InPrice,
					InPricePFT,InPricePMT,InCity,InArea,InAddress,InID,InLAT,InLNG,InREALAddress,
					InKEY,InREALAddressa,astMARKer,astIconD,astIDivs,astMARKersss,astLocation,astPricedata,
					astMAPVPricss,astMAPVPricees,InPtName,mInID,xInID,InPID,InCmPound,
					ROIstus,ROIsales, ROIcountsales, ROIctsls, InPurPose, InTYPE;
					
					location = new L.LatLng(data[i].InLAT, data[i].InLNG);		
												
						
					asGLat      = data[i].InLAT;	
					InLAT       = data[i].InLAT;	
                    InLNG       = data[i].InLNG;
					mdROIPID    = data[i].mdROIPID;
					ROIstus     = data[i].ROIstus;
					ROIsales    = data[i].ROIsales;
					ROIctsls    = data[i].ROIcountsales;
					InPurPose   = data[i].InPurPose;
					InTYPE      = data[i].InTYPE;
					GNo         = data[i].GNo;		
					mdVPrice    = data[i].mdVPrice;	
                    mdVPricePFT = data[i].mdVPricePFT;	
                    mdVPricePMT = data[i].mdVPricePMT;	
					mdVPricPFT  = data[i].mdVPricePFTs;	
                    mdVPricPMT  = data[i].mdVPricePMTs;	
					mdInID      = data[i].InID;	
					
                    astLocation = new L.LatLng(InLAT, InLNG);
                    	
					mdLATLNG    = InLNG+"_"+InLAT;
					
					mdMAPVPrcs  = mdMAPVPrices(mdVPrice,mdVPricePFT,mdVPricePMT,mdLATLNG);
					if(ROIstus == "ROI")
						mdMAPVPrcs = ROIsales+"%";
					
					mdMARReKPen = mdMARKPen(mdVPrice,mdVPricePFT,mdVPricePMT,mdVPricPFT,mdVPricPMT,ROIstus,ROIsales,mdLATLNG);
					mdMAPReIcns = mdMAPIcons(mdMARReKPen);
					
					mdRetMRKNFo = mdMARKINFo(mdInID);
					
                    astMARKer = new L.Marker(astLocation, {
                        title: "",
			            alt: "",
			            reseOnHover:true,
			            icon:mdMAPReIcns
					});
					
					astMARKer.mYLATLNG   = mdLATLNG;
					astMARKer.mYTYPe     = InTYPE;
					astMARKer.mYROIstus  = ROIstus;
					astMARKer.mYmdROIPID = mdROIPID;
					astMARKer.mYmdGNo    = GNo;
					astMARKer.mYmdInID   = mdInID;
					
					
		            astMARKer.bindPopup(mdRetMRKNFo, {minWidth: '250',maxWidth: '300'})
					    .on('click',function(e)
						{
							mYLATLNG   = e.target.mYLATLNG;
					        mYTYPe     = e.target.mYTYPe;
					        mYROIstus  = e.target.mYROIstus;
					        mYmdROIPID = e.target.mYmdROIPID;
							mYmdGNo    = e.target.mYmdGNo;
							mYmdInID   = e.target.mYmdInID;
							
							$(".astDTBLeOFIndxes").addClass("astDTBLIndxs");
						    astMARKerSHARe(mYmdInID,"","","");
							mdSHOWmarker(mYLATLNG,mYTYPe,mYROIstus,mYmdROIPID,mYmdGNo,mYmdInID);
						});		 
                    users.addLayer(astMARKer);
						
			}
					
		    map.fitBounds(users.getBounds());
			autoLOADmss(0,dfCountries);
            firstLoad = false;
					
					
					if(defMAP == "SHareDMAP" || defMAP == "MYmAP")
					{
						let defGeTzOooOm = $("#defGeTzOooOm").val();
						if(defGeTzOooOm !="12" && defGeTzOooOm !="")
					    {
						    setTimeout(function()
					        {
							    let latlngs =[],defGeTzOooooOm,
							        southWesta,southWestb,northEasta,northEastb;
							
							        defGeTzOooooOm = defGeTzOooOm.split("_");
							
							        southWesta = defGeTzOooooOm[0];
							        southWestb = defGeTzOooooOm[1];
							        northEasta = defGeTzOooooOm[2];
							        northEastb = defGeTzOooooOm[3];
							
							        southWest = new L.LatLng(southWesta,southWestb);
							        northEast = new L.LatLng(northEasta,northEastb);
							
							        let lngSpan = northEast.lng - southWest.lng;
		                            let latSpan = northEast.lat - southWest.lat;
		
		                            let defmYLatLng =  new L.LatLng( southWest.lat + latSpan * Math.random(),
		                                                     southWest.lng + lngSpan * Math.random());
							        latlngs.push(northEast,southWest,defmYLatLng);
							        let defGeTBounds = new L.LatLngBounds(latlngs);
							       // map.fitBounds(defGeTBounds);
									map.flyToBounds(defGeTBounds,{
										animate:true,
										duration:1.5
									});
							
							},10);
						}
					}
					
					
					if(defFILTErs !="")
					{
						let defGeTzOooOm   = $("#defGeTzOooOm").val();
						setTimeout(function()
					        {
							    let latlngs =[],defGeTzOooooOm,
							        southWesta,southWestb,northEasta,northEastb;
							
							        defGeTzOooooOm = defGeTzOooOm.split("_");
							
							        southWesta = defGeTzOooooOm[0];
							        southWestb = defGeTzOooooOm[1];
							        northEasta = defGeTzOooooOm[2];
							        northEastb = defGeTzOooooOm[3];
							
							        southWest = new L.LatLng(southWesta,southWestb);
							        northEast = new L.LatLng(northEasta,northEastb);
							
							        let lngSpan = northEast.lng - southWest.lng;
		                            let latSpan = northEast.lat - southWest.lat;
		
		                            let defmYLatLng =  new L.LatLng( southWest.lat + latSpan * Math.random(),
		                                                     southWest.lng + lngSpan * Math.random());
							        latlngs.push(northEast,southWest,defmYLatLng);
							        let defGeTBounds = new L.LatLngBounds(latlngs);
							       // map.fitBounds(defGeTBounds);
									map.flyToBounds(defGeTBounds,{
										animate:true,
										duration:1.0
									});
							        $("#defFILTErs").val("");
							},10);
					}
					
					//defMAPLOAD("dfLoINFOs");
		}
		else
		{
			$("#error-msg").fadeIn("slow").text("No Data Found ....");
			setTimeout(function(){
				autoLOADmss(0,"");
			},2000);
		} 
	}
	
	function mdSHOWmarker(mYLATLNG,mYTYPe,mYROIstus,mYmdROIPID,mYmdGNo,mYmdInID)
	{
		let dfAction = "", mdResult, 
		    mdSEARchVALUe, mdSIZeVALUe, mdSYMBVALUe, mdMPrcVALUe, mdXPrcVALUe, 
			mdSResDNeVLUes, mdSBedsVLUes, mdSBthsVLUes, mdSPricesVLUes, SAreasVLUes;
		
		    mdSEARchVALUe   = $(".mdMAPssearchBOx").val();
		    mdSIZeVALUe     = $(".mdMAPsSizeVLUe").val();
			mdSYMBVALUe     = $(".mdMAPscurrencY").val(); 
		    mdMPrcVALUe     = mdSPricePMTsVLUs("min");
		    mdXPrcVALUe     = mdSPricePMTsVLUs("max");		
	        
			mdSResDNeVLUes  = $(".intsrSResDNeVLUes").val();
			mdSBedsVLUes    = $(".intsrSBedsVLUes").val();
			mdSBthsVLUes    = $(".intsrSBthsVLUes").val();
			mdSPricesVLUes  = $(".intsrSPricesVLUes").val();
			SAreasVLUes     = $(".intsrSAreasVLUes").val();
			
		    dfAction = "mdSHOWmarker";
		
		    $.ajax({
			    url:'<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php',
			    method:'POST',
			    data:{dfAction:dfAction,mYLATLNG:mYLATLNG,mYTYPe:mYTYPe,mYmdInID:mYmdInID,
			          mYROIstus:mYROIstus,mYmdROIPID:mYmdROIPID, mYmdGNo:mYmdGNo,
					  mdSEARchVALUe:mdSEARchVALUe, mdSIZeVALUe:mdSIZeVALUe, 
					  mdSYMBVALUe:mdSYMBVALUe, mdMPrcVALUe:mdMPrcVALUe,
					  mdXPrcVALUe:mdXPrcVALUe, mdSResDNeVLUes:mdSResDNeVLUes,
					  mdSBedsVLUes:mdSBedsVLUes, mdSBthsVLUes:mdSBthsVLUes,
					  mdSPricesVLUes:mdSPricesVLUes, SAreasVLUes:SAreasVLUes
				},
			    beforeSend:function()
			    {
				    $(".mdMARKclassINFo"+mYmdInID).html("LOADING...");
				},
			    success:function(mdResults)
			    {
					$(".mdMARKclassINFo"+mYmdInID).html(mdResults);
				}
			});
	}
	
	function dfLocationINFOss($results)
	{
		let dfmnVALUe,dfmdVALUe,dfmxVALUe,
		    dfmnVALUes,dfmdVALUes,dfmxVALUes,
		    astmPRIces = [], astxPRIces = [],
			dfValue, dfcounter = 0, InSZes, 
			astMAPSs, sYmbol, dftotal = 0, dfGrouPed = 0, dfGcluters = 0,
			dfmValue = "" , dfxValue = "", dfLocINFOPrices,
			dfCountry, dfCity, dfDistrict, dfArea, dfAdress,
			dfProName;

		    dfmnVALUe = "";
			dfmdVALUe = "";
			dfmxVALUe = "";
			
			InSZes    = $(".mdMAPsSizeVLUe").val();
			astMAPSs  = astMAPSzs(InSZes);
			sYmbol    = defcurrencsYmbols();
			dfUSDs    = defcurrencsYvALue();
			
			dfmnVALUe = $results[0].mInPricePMT;
			dfmdVALUe = $results[0].avGInPricePMT;
			dfmxVALUe = $results[0].xInPricePMT;
			dftotal   = $results[0].InNO;
			
			dfCountry  = $results[0].InCountry;
			dfCity     = $results[0].InCity;
			dfDistrict = $results[0].InDistrict;
			dfArea     = $results[0].InArea;
			dfAdress   = $results[0].InAddress;
			dfProName  = $results[0].InProName;
			
			if(InSZes == "ft")
			{
				dfmnVALUe = $results[0].mInPricePFT;
			    dfmdVALUe = $results[0].avGInPricePFT;
			    dfmxVALUe = $results[0].xInPricePFT;
			}
				
		
		dfLocINFOPrices = '<div><b>'+dftotal+'</b></div>'+
		                  '<div><span>'+sYmbol+'</span><b>'+dfmnVALUe+'</b><span>'+astMAPSs+'</span></div>'+
						  '<div><span>'+sYmbol+'</span><b>'+dfmdVALUe+'</b><span>'+astMAPSs+'</span></div>'+
						  '<div><span>'+sYmbol+'</span><b>'+dfmxVALUe+'</b><span>'+astMAPSs+'</span></div>';
		
		
		$(".dfLocINFOPrices").html(dfLocINFOPrices);
	}
	
	function mdLOADInDxDetails(mdResults)
	{

		distPri    = $(".mdMAPsSizeVLUe").val();
	    cncsYmbol  = $(".mdMAPscurrencY").val();
		InCountry  = mdResults[0].InCountry;
		InCity     = mdResults[0].InCity;
		InDistrict = mdResults[0].InDistrict;
		InArea     = mdResults[0].InArea;
		InAddress  = mdResults[0].InAddress;
		InComPound = mdResults[0].InComPound;
		mInSize    = mdResults[0].mInSize;
		xInSize    = mdResults[0].xInSize;
		mInPrice   = mdResults[0].mInPrice;
		xInPrice   = mdResults[0].xInPrice;
		InProName  = mdResults[0].InProName;
		InPurPose  = mdResults[0].InPurPose;
		InTYPE     = mdResults[0].InTYPE;
		InBEDs     = mdResults[0].InBEDs;
		InPATHs    = mdResults[0].InPATHs;
				
		asDTBOFndx = astDTBLeOFIndex(InCountry,InCity,InDistrict,InArea,InAddress,InComPound,mInSize,xInSize,
	                                 mInPrice,xInPrice,InProName,InPurPose,InTYPE,InBEDs,InPATHs,cncsYmbol,distPri);
				
		$(".astDTBLeOFBODYs").html(asDTBOFndx);
				
		$(".astDTBLeOFBODYs").css({'opacity':'1'});
	}
	
	//////////////
	
	function astMOReIMAPs(id)
	{
		let fm    = $(id).attr("fm");
		let aInID = $(id).attr("InID");
		
		if(fm == "sn")
		{
			$("#astMOReIMAPsLIST").addClass("astMORehiders");
			astMOReLOADetails($(id));
		}
		else if(fm == "close")
		{
			$("#astMOReIMAPsLIST").removeClass("astMORehiders");
		}
	}
	
	function astMOReLOADetails($id)
	{
	    let dfAction = "", mdResult,astMLOADer, fm, InID, mYLATLNG, mYROIstus,
		    mdSEARchVALUe, mdSIZeVALUe, mdSYMBVALUe, mdMPrcVALUe, mdXPrcVALUe, 
			mdSResDNeVLUes, mdSBedsVLUes, mdSBthsVLUes, mdSPricesVLUes, SAreasVLUes,
			InTYPe, mYmdROIPID ;
		
		    fm              = $id.attr("fm");
		    InID            = $id.attr("InID");
            mYLATLNG        = $id.attr("mYLATLNG");
		    mYROIstus       = $id.attr("mYROIstus");
            InTYPe          = $id.attr("InTYPe");
		    mYmdROIPID      = $id.attr("mYmdROIPID");
			
		    mdSEARchVALUe   = $(".mdMAPssearchBOx").val();
		    mdSIZeVALUe     = $(".mdMAPsSizeVLUe").val();
			mdSYMBVALUe     = $(".mdMAPscurrencY").val(); 
		    mdMPrcVALUe     = mdSPricePMTsVLUs("min");
		    mdXPrcVALUe     = mdSPricePMTsVLUs("max");		
	        
			mdSResDNeVLUes  = $(".intsrSResDNeVLUes").val();
			mdSBedsVLUes    = $(".intsrSBedsVLUes").val();
			mdSBthsVLUes    = $(".intsrSBthsVLUes").val();
			mdSPricesVLUes  = $(".intsrSPricesVLUes").val();
			SAreasVLUes     = $(".intsrSAreasVLUes").val();
			
		    astMLOADer = astMOReLOADer("LOADING...");
		    $("#astMOReIMAPsLOAD").html("");
		
		    dfAction = "astMLOADers";
		
		    $.ajax({
			    url:'<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php',
			    method:'POST',
			    data:{fm:fm,dfAction:dfAction,mYLATLNG:mYLATLNG,mYTYPe:mYTYPe,mYmdInID:mYmdInID,
			          mYROIstus:mYROIstus,mYmdROIPID:mYmdROIPID, mYmdGNo:mYmdGNo,
					  mdSEARchVALUe:mdSEARchVALUe, mdSIZeVALUe:mdSIZeVALUe, 
					  mdSYMBVALUe:mdSYMBVALUe, mdMPrcVALUe:mdMPrcVALUe,
					  mdXPrcVALUe:mdXPrcVALUe, mdSResDNeVLUes:mdSResDNeVLUes,
					  mdSBedsVLUes:mdSBedsVLUes, mdSBthsVLUes:mdSBthsVLUes,
					  mdSPricesVLUes:mdSPricesVLUes, SAreasVLUes:SAreasVLUes},
			    beforeSend:function()
			    {
				    $("#astMOReIMAPsLOAD").html(astMLOADer);
				},
			    success:function(res)
			    {
				    $("#astMOReIMAPsLOAD").html(res);
				}
			});
	}
	
	////////////////
	
	function mdMAPVPrices(mdVPrice,mdVPricePFT,mdVPricePMT,mdLATLNG)
	{
		///////////////
		let mdSize, mdVCur, astMPSzs, mdNVPrice, 
		    mdMAPchanGePRIces, mdVRePrices;
		
		    mdSize    = $(".mdMAPsSizeVLUe").val();
			mdVCur    = $(".mdMAPscurrencY").val();
		    astMPSzs  = astMAPSzs(mdSize);
		    mdNVPrice = mdVPricePMT;	
		    
			if(mdSize == "ft")
		    {
			    mdNVPrice   = mdVPricePFT;
			}
		
		
		    mdMAPchanGePRIces = '<b class="astMAPchangePRIces astMAPchangePRIces'+mdLATLNG+'"'+ 
		                            'InID=""' +
									'avGPf="" aMPF="" aXPF=""' +
									'avGPm="" aMPm="" aXPm="">'+ 
									mdNVPrice +
							    '</b>'; 
        
		    mdVRePrices       = '<i>'+ mdVCur +'</i>'+mdMAPchanGePRIces+'<i class="astMAPchanGefTOm m-ft-m">'+astMPSzs+'</i>';
        
	    return 	mdVRePrices;			 
	}
	
	function mdSWItcHReTs(mdVPrice,mdMAPVPrcs,mdLATLNG)
	{
		let mdStcHReTs = "";
		
		
		    if(mdVPrice < 50)
		    {
			    mdStcHReTs = '<div class="marker-pin" style="background-color:#27c93f;">'+mdMAPVPrcs+'<span style="background-color:#27c93f"></span></div>';
			}
		    else if( mdVPrice < 100)
		    {
			    mdStcHReTs = '<div class="marker-pin" style="background-color:#41b63f">'+mdMAPVPrcs+'<span style="background-color:#41b63f"></span></div>';
			}
		    else if( mdVPrice < 200)
		    {
			    mdStcHReTs = '<div class="marker-pin" style="background-color:#70923f;">'+mdMAPVPrcs+'<span style="background-color:#70923f"></span></div>';
			}
		    else if( mdVPrice < 500)
		    {
			    mdStcHReTs = '<div class="marker-pin" style="background-color:#90733f;">'+mdMAPVPrcs+'<span style="background-color:#90733f"></span></div>';
			}
		    else if( mdVPrice < 1000)
		    {
			    mdStcHReTs = '<div class="marker-pin" style="background-color:#ab5d3f">'+mdMAPVPrcs+'<span style="background-color:#ab5d3f"></span></div>';
			}
		    else if( mdVPrice < 3000)
		    {
			    mdStcHReTs = '<div class="marker-pin" style="background-color:#cc3d3f">'+mdMAPVPrcs+'<span style="background-color:#cc3d3f"></span></div>';
			}
		    else if( mdVPrice < 5000)
		    {
			    mdStcHReTs = '<div class="marker-pin" style="background-color:#e8183f">'+mdMAPVPrcs+'<span style="background-color:#e8183f"></span></div>';
			}
		    else
		    {
			    mdStcHReTs = '<div class="marker-pin astMARKerPen astMARKerPen'+mdLATLNG+'" style="background-color:#fd043f">'+mdMAPVPrcs+'<span style="background-color:#fd043f"></span></div>';
			}
		    
		return mdStcHReTs;
	}
	
	function mdMARKPen(mdVPrice,mdVPricePFT,mdVPricePMT,mdVPricPFT,mdVPricPMT,ROIstus,ROIsales,mdLATLNG)
	{
		let astIDivs = "", mdMAPVPrcs, mdStcHReTs, mdSize, mdVPrce;
		
		    mdSize     = $(".mdMAPsSizeVLUe").val();
		    mdMAPVPrcs = mdMAPVPrices(mdVPrice,mdVPricePFT,mdVPricePMT,mdLATLNG);
		
		    if(ROIstus == "ROI")
		    {
			    mdMAPVPrcs = ROIsales+"%" ;
			    mdVPrce    = ROIsales * 100;
			}
			else
			{
				mdVPrce = mdVPricPMT;
				if(mdSize == "ft")
				{
					mdVPrce = mdVPricPFT;
				}
			}
		
		    mdStcHReTs = mdSWItcHReTs(mdVPrce,mdMAPVPrcs,mdLATLNG);
		
		return mdStcHReTs;
	}
	
	function mdMAPIcons(astIDivs)
	{
		let astIconD;
		
			astIconD = new L.DivIcon({
		        className: 'custom-icon',
		        html     : astIDivs,
		        iconSize : [80,20],
		        iconAnchor : [40,10]
			});	
			
		return astIconD;
	}
	
	function mdMARKINFo(mYmdInID)
	{
		let mdRetMARKINFo, mdMARReKPen;
		 
		    mdMARReKPen   = "";
		    mdRetMARKINFo = '<div class="leaf-popup mdMARKclassINFo mdMARKclassINFo'+mYmdInID+'" style="text-align: center; margin-left: auto; margin-right: auto;">'+ mdMARReKPen +'</div>';
	    
		return mdRetMARKINFo;
	}
	
	//////
	function mdSTRNGRePlAce(mdSTR,mdTYPe)
	{
		let mdReSTRs = "";
		if(mdSTR != "")
		{
			if(mdTYPe == "remove")
			{
				mdReSTRs = mdSTR.replace(/[-]/g," ");
			}
			else if(mdTYPe == "add")
			{
				mdReSTRs = mdSTR.replace(/[ ]/g,"-");
			}
		}
		
		return mdReSTRs;
	}
	
	function mdMAPchsrchnGs(id)
	{
		let fm, fmID, fmLst, fmKNd, fmVALUe;
		
		    fm      = $(id).attr("fm");
			fmID    = $(id).attr("fmID");
			fmLst   = $(id).attr("fmLst");
			fmKNd   = $(id).attr("fmKNd");
			fmVALUe = $(id).val();
			
			dfAction        = "mdsearchLst";
			
			mdMAPscountries = $(".mdMAPscountries").val();
			mdMAPscities    = $(".mdMAPscities").val();
			
			if(fmKNd == "srSCNTRY")
			{
				mdMAPscountries = fmVALUe;
				$(".mdMAPscountries").val(fmVALUe);
				mdReSeTmaP();
				astdefURLOGo();
				mdFRsTLoAds(fmKNd,fmVALUe,mdMAPscountries,mdMAPscities);
			}
			else if(fmKNd == "srSCITY")
			{
				mdMAPscities = fmVALUe;
				$(".mdMAPscities").val(fmVALUe);
				mdReSeTmaP();
				
				$(".mdMAPsdistrict").val("");
			    $(".mdMAPsareas").val("");
			    $(".mdMAPsaddress").val("");
			    $(".mdMAPsbuilds").val("");
			    $(".mdMAPsPname").val("");
			}
					
		
	}

	function mdFRsTLoAds(fmKNd,fmVALUe,mdMAPscountries,mdMAPscities)
	{
		let mdResults = "", dfAction, defMAP;
            dfAction  = "mdsearchLst";
			defMAP    = $("#defaultMAP").val();
		$.ajax({
			url:'mdReQuests/mdReQPHP/mdReQmaPs.php',
			method:'POST',
			data:{fmKNd:fmKNd, dfAction:dfAction, 
			      mdMAPscountries:mdMAPscountries, mdMAPscities:mdMAPscities},
			beforeSend:function()
			{	
			    $(".mdMAPSelmoreshdrs").addClass("mdsearchLstnone");
			},
			success:function(mdResult)
			{
				mdResults = mdResult.split("|");
				$(".mdMAPSelmoreshdrs").removeClass("mdsearchLstnone");

				if(fmKNd == "srSCNTRY")
			    {
				    //$(".mdMAPscountries").val(fmVALUe);
					//$(".mdMAPscountries").html(fmVALUe);
					
					$(".mdMAPscities").html(mdResults[0]);
					
					if(mdMAPscities != "")
					{
						$(".mdMAPscities").val(mdMAPscities);
					}
					
					if(fmVALUe != 0)
					{
						$(".mdMAPsdistrict").val("");
			            $(".mdMAPsareas").val("");
			            $(".mdMAPsaddress").val("");
			            $(".mdMAPsbuilds").val("");
			            $(".mdMAPsPname").val("");
					}
					
				}
			    else if(fmKNd == "srSCITY")
			    {
					if(fmVALUe != 0)
					{
						$(".mdMAPsdistrict").val("");
			            $(".mdMAPsareas").val("");
			            $(".mdMAPsaddress").val("");
			            $(".mdMAPsbuilds").val("");
			            $(".mdMAPsPname").val("");
					}
				}
				
				if(defMAP != "SHareDMAP" || defMAP != "MYmAP")
				{
				}
			}
		});
	}

	/// helpers /////////////
	function mdZOomReset(evt,id)
	{
		let fm, md, bl;
		    fm = $(id).attr("fm");
			md = $(id).attr("md");
			bl = $(id).attr("bl");
			
			if(fm == "show")
			{
				if($("."+bl+" .mdZoomAction").hasClass("mdZoomActionHIDe"))
				{
					$(".mdZoomAction").addClass("mdZoomActionHIDe");
					$("."+bl+" .mdZoomAction").removeClass("mdZoomActionHIDe");
				}
				else
				{
					$(".mdZoomAction").addClass("mdZoomActionHIDe");
				}
			}
			else if(fm == "mdZoomOUT")
			{
				$(".mdZoomAction").addClass("mdZoomActionHIDe");
				mdReSeTmaP();
		        defMAPLOAD("default"); 
			}
			else if(fm == "mdResetOPtions")
			{
			    $("textarea.mdRstOPtions").val(""); 
				$(".mdRstOPtions input").val("");
				$(".mdRstOPtions select").val("");
				$(".mdRstOPtions select.mdMAPscountries").val("UAE");
				mdReSeTmaP();
                location.reload();				
			}
			else if(fm == "mdRstVIeW")
			{
			    mdRstVIeW(); 
			}
			else if(fm == "sideSAHRe")
			{
				
				if($(id).hasClass("start"))
				{
					mdRstSHeResIkDe(fm);
					mdSHAReMAPs(evt,id);
				}
				else
				{
					mdRstSHeResIkDe(fm);
				}
				
			}
	}
	
	function mdSHAReMAPs(evt,id)
    {
	    let fm, defsHARePHOTO,defURLs,defsHAReTTLe,defsHAReDeScRIPTIon;
		
		    fm = $(id).attr("fm");
			if(fm == "sideSAHRe")
			{
				astdefURLOGos();
		        defsHARePHOTO = $("#astdefURLOGosa").val();
		        $("#defaultMAP").val("SHareDMAP");
		        defhEADeRsLst();
		        aststHEADURls("");
		
		        defURLs      = $("#sdefPATHeaders").val();
		        defsHAReTTLe = $(".mdMAPscountries").val();

		        defsHAReTITLe = "PROPERTY INDEX MAP FOR "+defsHAReTTLe;
		        defsHAReDeScRIPTIon = " SHARED MAP "+defsHAReTITLe;

		        const socialmedia = GetSocialMediaSites_WithShareLinks_OrderedByPopularity();
		        const socialmediaurls = GetSocialMediaSiteLinks_WithShareLinks({
			        'url':defURLs,
			        'title':defsHAReTITLe,
			        'image':defsHARePHOTO,
			        'desc':defsHAReDeScRIPTIon,
			        'appid':defURLs,
			        'redirecturl':defURLs,
			        'via':defURLs,
			        'hashtags':defURLs,
			        'provider':defURLs,
			        'language':"en",
			        'userid':defURLs,
			        'category':defURLs,
			        'phonenumber':defURLs,
			        'emailaddress':defURLs,
			        'ccemailaddress':defURLs,
			        'bccemailaddress':defURLs,
				});
				
				let children = [];
				
		        for(var i = 0; i < socialmedia.length; i++) 
		        {
			        const socialmedium = socialmedia[i];	
			        
					if(socialmedium != "skype")
					children.push(
				        '<div class="mdRstSHsIDeITem astFLex">'+
					        '<a href="javascript:void(0)"  class="btn astFLex" socialmedium="'+socialmedium+'" id="'+socialmediaurls[socialmedium]+'" fm="'+fm+'" onclick="mdSHAReOPen(this)">'+
						        '<img src="<?php echo $smURLPATH;?>assets/inAssets/share_icons/'+socialmedium+'.png">'+
					        '</a>'+
				        '</div>'
			        );
				}
		
		        $('.mdRstSHsIDeBODYs').html("");
		        $('.mdRstSHsIDeBODYs').empty();
		        if(!$(".mdRstSHeResIkDe").hasClass("mdZoomActionHIDe"))
				{
				    $('.mdRstSHsIDeBODYs').append(children.join());
				}
				
	            return true;
				
			}
	}
	
	function mdSHAReOPen(id)
	{
		let shareUrl = $(id).attr("id"),
		    fm = $(id).attr("fm");
	        shareParams  = "";
	        window.open(shareUrl);
			
			mdRstSHeResIkDe(fm);
	}
	
	function mdRstSHeResIkDe(fm)
	{
		if(fm == "sideSAHRe")
		{
			if($(".mdRstSHeResIkDe").hasClass("mdZoomActionHIDe"))
			{
				$(".mdRstSHeResIkDe").removeClass("mdZoomActionHIDe");
				
				$(".mdRstSHeRes a.mdZoomOUTtn").addClass("close");
			    $(".mdRstSHeRes a.mdZoomOUTtn").removeClass("start");
				$(".mdRstSHeRes a.mdZoomOUTtn").find("i").removeClass("fa-share");
				$(".mdRstSHeRes a.mdZoomOUTtn").find("i").addClass("fa-close");
			} 
			else
			{
				$(".mdRstSHeResIkDe").addClass("mdZoomActionHIDe");
				$(".mdRstSHsIDeBODYs").html("");
				
				$(".mdRstSHeRes a.mdZoomOUTtn").removeClass("close");
			    $(".mdRstSHeRes a.mdZoomOUTtn").addClass("start");
				$(".mdRstSHeRes a.mdZoomOUTtn").find("i").addClass("fa-share");
				$(".mdRstSHeRes a.mdZoomOUTtn").find("i").removeClass("fa-close");
			}
			    
		}
	}
	
	function mdRstVIeW()
	{
		if($(".mdInitaiteMAPs").hasClass("mdInitaiteMAPins"))
		{
			$(".mdInitaiteMAPs").removeClass("mdInitaiteMAPins");
			$('.mdRstVIeW a.mdZoomOUTtn').find("i").removeClass("fa-eye");
			$('.mdRstVIeW a.mdZoomOUTtn').find("i").addClass("fa-eye-slash");
			$(".mdZOomReset.mdSeARchTHis").removeClass("mdSeARchTOP");
		}
		else
		{
			$(".mdInitaiteMAPs").addClass("mdInitaiteMAPins");
			$('.mdRstVIeW a.mdZoomOUTtn').find("i").addClass("fa-eye");
			$('.mdRstVIeW a.mdZoomOUTtn').find("i").removeClass("fa-eye-slash");
			$(".mdZOomReset.mdSeARchTHis").addClass("mdSeARchTOP");	
		}
	}
	
    function mdReSeTmaP()
	{
		$("#defaultMAP").val("defaultMAP");
	    $("#defGeTzOooOm").val("");
	}	
	
	function aststHEADURls(defTYPes)
	{
		let defMAP,defPATH,defGeTzOOm,defCURNCY,defSIZE,defMIN,defMAX,
		    defSEARCHMAP,defSEARCHNme,mYLaT,mYLnG,maPSHAReD,defmzOOm,
			stWEBLAYER;
		    
	    defSIZE       = $(".mdMAPsSizeVLUe").val();
		defMAP        = $("#defaultMAP").val();
	    defPATH       = $(".mdMAPscountries").val();
		defPATH       = mdSTRNGRePlAce(defPATH,"add");
		defCURNCY     = defcurrencsYmbols();
		defMIN        = mdSPricePMTsVLUs("min");
		defMAX        = mdSPricePMTsVLUs("max");	   
	    defSEARCHMAP  = $(".mdMAPssearchBOx").val();
		defSEARCHNme  = mdSTRNGRePlAce(defSEARCHMAP,"add");	
		mYLaT         = $("#maPSHAReLaT").val();
		mYLnG         = $("#maPSHAReLnG").val();
		maPSHAReD     = $("#maPSHAReID").val();
		stWEBLAYER    = $("#stWEBLAYER").val();
		
		if(defMAP == "SHareDMAP" || defMAP == "MYmAP")
		{
			defmzOOm = $("#defGeTzOooOm").val();
		}
		else
		{
		    defmzOOm = "";
		}
		
		    dfCities    = $(".mdMAPscities").val();
			fDistricts  = $(".mdMAPsdistrict").val();
		    dfArea      = $(".mdMAPsareas").val();
			dfAddress   = $(".mdMAPsbuilds").val();
			dfProName   = $(".mdMAPsPname").val();
		
		    dfCities    = mdSTRNGRePlAce(dfCities,"add");
			fDistricts  = mdSTRNGRePlAce(fDistricts,"add");
			dfArea      = mdSTRNGRePlAce(dfArea,"add");
			dfAddress   = mdSTRNGRePlAce(dfAddress,"add");
			dfProName   = mdSTRNGRePlAce(dfProName,"add");
        
	    stHEADURls(defTYPes,defMAP,defPATH,defmzOOm,defSEARCHNme,defCURNCY,defSIZE,defMIN,defMAX,maPSHAReD,mYLaT,mYLnG,stWEBLAYER,dfCities,fDistricts,dfArea,dfAddress,dfProName);
	}
	
	function stHEADURls(defTYPes,defMAP,defPATH,defGeTzOOm,defSEARCh,defCURNCY,defSIZE,defMIN,defMAX,maPSHAReD,mYLaT,mYLnG,stWEBLAYER,dfCities,fDistricts,dfArea,dfAddress,dfProName)
	{
		let defURLs = "";
		
		    dfdetails = "&aG="+dfCities+"&ad="+fDistricts+"&ac="+dfArea+"&aA="+dfAddress+"&ar="+dfProName;
            defURLs = "?defMAP="+defMAP+"&defPATH="+defPATH+dfdetails+"&zOOm="+defGeTzOOm+"&ds="+defSEARCh+"&CY="+defCURNCY+"&SZ="+defSIZE
			          +"&dm="+defMIN+"&dx="+defMAX+"&sD="+maPSHAReD+"&layer="+stWEBLAYER;
					  
	    window.history.pushState("Details","Title","index.php"+defURLs);
		shareUrl = defURLs;
		
		$("#sdefPATHeaders").val(getUrl.origin+getUrl.pathname+shareUrl);
	}
	
	function defhEADeRsLst()
	{
		let defGeTzOOm,southWest,northEast,markersList,markersLista,southWestD,
			northEastD,southWesta,southWestb,northEasta,northEastb;
		    
			defGeTzOOm = map.getBounds();
		    southWest  = defGeTzOOm.getSouthWest();
		    northEast  = defGeTzOOm.getNorthEast();

		    markersLista   = southWest+"|"+northEast;
		
		    markersLista   = markersLista.split("|");
		
		    southWestD = markersLista[0];
		    northEastD = markersLista[1];
		
		    southWest = southWestD.split(",");
		    northEast = northEastD.split(",");
		
		    southWesta = southWest[0];
		    southWestb = southWest[1];
							
		    southWesta = southWesta.replace(/[(,LatLng]/g,'');
            southWestb = southWestb.replace(/[), ]/g,'');	
							 
	        northEasta = northEast[0];
		    northEastb = northEast[1];
							
			northEasta  = northEasta.replace(/[(,LatLng]/g,'');
            northEastb  = northEastb.replace(/[), ]/g,'');	
			
            markersList = southWesta+"_"+southWestb+"_"+northEasta+"_"+northEastb;
			
			$("#defGeTzOooOm").val(markersList);
	}
	
	function autoMAPhelPrices()
	{
		
	}
	
	function defcurrencsYmbols()
	{	
		let crrncYVlue  = $(".mdMAPscurrencY").val();
		return crrncYVlue;
	}
	
	function defcurrencsYvALue()
	{
		let crrncYVlue  = $(".mdMAPscurrencYVLUe").val();
		return crrncYVlue;
	}
	
	function fractRemove(number)
	{
		return Math[number < 0 ? 'ceil' : 'floor'](number);
	}
		
	///////////////////
	
	function astDTBLeOFIndex(InCountry,InCity,InDistrict,InArea,InAddress,InComPound,mInSize,xInSize,
	                         mInPrice,xInPrice,InProName,InPurPose,InTYPE,InBEDs,InPATHs,sYmbol,distPri)
	{
		let astDTOFIndex;
		
		    astDTOFIndex = '<div class="astMOReIMAPtes astFLex">'+
			                  '<div class="astMOReTBcon">'+
		                        '<table class="table table-hover">'+
				                    '<tbody class="astFLex">'+
									    '<tr> <th>Country</th> <td>'+InCountry+'</td> </tr>'+
				                        '<tr  class="odd"> <th>City</th> <td>'+InCity+'</td> </tr>'+
					                    '<tr> <th>District</th> <td>'+InDistrict+'</td> </tr>'+
										'<tr  class="odd"> <th>Area</th> <td>'+InArea+'</td> </tr>'+
										'<tr> <th>Address</th> <td>'+InAddress+'</td> </tr>'+
										'<tr> <th>Building</th> <td>'+InComPound+'</td> </tr>'+
										'<tr  class="odd"> <th>Project Name</th> <td>'+InProName+'</td> </tr>'+
										'<tr> <th>Purpose for</th><td>'+InPurPose+'</td> </tr>'+
										'<tr  class="odd"> <th>Type</th> <td>'+InTYPE+'</td> </tr>'+
										'<tr> <th>Beds</th> <td>'+InBEDs+'</td> </tr>'+
										'<tr  class="odd"> <th>Baths</th> <td>'+InPATHs+'</td> </tr>'+
										'<tr> <th>Price From</th> <td>'+mInPrice+'</td> </tr>'+
										'<tr  class="odd"> <th>Price To</th> <td>'+xInPrice+'</td> </tr>'+
										'<tr> <th>Currency</th> <td>'+sYmbol+'</td> </tr>'+
										'<tr  class="odd"> <th>Measurement</th> <td>SQ'+distPri+'</td> </tr>'+
										'<tr> <th>Size From</th> <td>'+mInSize+'</td> </tr>'+
										'<tr  class="odd"> <th>Size To</th> <td>'+xInSize+'</td> </tr>'+
				                    '</tbody>'+
			                    '</table>'+
							   '</div>'+	
		                    '</div>';
		return astDTOFIndex;				
	}
	
	function viewINDeXDTes(id)
	{
		if($(".astDTBLeOFIndxes").hasClass("astDTBLIndxs"))
		{
			defMAPLOAD("indexDetails");
			$(".astDTBLeOFIndxes").removeClass("astDTBLIndxs");
			$(".mdviewINDeXDTes").html("hide details");
		}
		else
		{
			$(".astDTBLeOFIndxes").addClass("astDTBLIndxs");
			$(".mdviewINDeXDTes").html("view details");
		}
	}

	function mdMAPssearchOPTIONs(id)
	{
		let fm;
		    fm = $(id).attr("fm");
		if(fm == "searchTB")
		{
			$(".mdUNLOCkVALUes").val("mdMain");
			$(".mdsearchLstPAsnone").val("mdsearchLstnone");
			$(".mdsearchLstOPsnone").val("mdsearchLstnone");
			if($(id).hasClass("start"))
			{
				$(".mdsearchTYPclicked").val("searchTB");
				$(".mdFXDoPtions a.mdMAPsearchVALUe").removeClass("start");
				$(".mdMAPSelmores").css({"left":"0px"});
				$(".mdMAPSedowncontainer").addClass("astDnone");
				$(".mdFXDsch div.mdMAPssearchBTNs a.mdMAPsearchVALUe").first().addClass("start");
				$(".mdFXDsch div.mdMAPssearchBTNs a.mdMAPsearchVALUe").first().removeClass("close");
				$(".mdFXDsch div.mdMAPssearchBTNs a.mdMAPsearchVALUe").first().find("i").removeClass("fa-minus");
				$(".mdFXDsch div.mdMAPssearchBTNs a.mdMAPsearchVALUe").first().find("i").addClass("fa-plus");
				
				setTimeout(function()
				{
					mdLOADhtmlTbLe();
				},100);
			}
			else
			{
				$(".mdsearchTYPclicked").val("searchMP");
				$(".mdFXDoPtions a.mdMAPsearchVALUe").addClass("start");
				$(".mdMAPSelmores").css({"left":"-100%"});
				//defMAPLOAD("default");
			}
		}
		else
		{
			$(".mdsearchTYPclicked").val("searchMP");
			$(".mdFXDoPtions a.mdMAPsearchVALUe").addClass("start");
		    $(".mdMAPSelmores").css({"left":"-100%"});
			defMAPLOAD("default");
		}
		
		mdFXDhidesss(0);
		$(".astDTBLeOFIndxes").addClass("astDTBLIndxs");
		
	}
	
	///// tables /////////
	function mdMAPSedowns(id)
	{
		let fm, fb, fmID, fmLst, fbset;
		    fm   = $(id).attr("fm");
			fb   = $(id).attr("fb");
			fmID = $(id).attr("fmID");
			
			fmLst = fmID+"Lst";
		$(".astDTBLeOFIndxes").addClass("astDTBLIndxs");	
		if(fm == "mdMAPsmore")	
		{
			$(".mdMAPDrOPcontainer .mdMAPsearchLst").addClass("astDnone");
		    $(".mdclear.mdMAPsearchLst").html("");
			$(".mdclear.mdMAPsearchLst").addClass("astDnone");
			if($(id).hasClass("start"))
			{
				$("."+fmID).removeClass("astDnone");
				$(id).find("i").removeClass("fa-plus");
				$(id).find("i").addClass("fa-minus");
				$(id).removeClass("start");
			}
			else
			{
				$("."+fmID).addClass("astDnone");
				$(id).find("i").addClass("fa-plus");
				$(id).find("i").removeClass("fa-minus");
				$(id).addClass("start");
			}
		}
		else if(fm == "mdMAPsearch")
		{
			$(".mdMAPDrOPcontainer .mdMAPsearchLst").addClass("astDnone");
		    $(".mdclear.mdMAPsearchLst").html("");
			$(".mdclear.mdMAPsearchLst").addClass("astDnone");
			
			if($("."+fmLst).hasClass("astDnones"))
			{
				$("."+fmLst).removeClass("astDnones");
				$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDnones");
				$(".mdMAPSedownlabel").removeClass("astDINactive");
				$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDINactive");
				
				if(fmID == "mdMAPsPurPoseSD")
				{
					$(".dfLocationINFOs").removeClass("dfLocationINFOsHIDe");
					$(".mdMAPschBOxsinLNk").css({'margin-top':'0px'});
				}
			}
			else
			{
				$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDnones");
				$(".mdMAPSedownlabel").removeClass("astDINactive");
				$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDINactive");
				$("."+fmLst).addClass("astDnones");
				$(id).parent().addClass("astDINactive");
				$("."+fmLst).addClass("astDINactive");
				
				if(fmID == "mdMAPsPrice" || fmID == "mdMAPsPricePMFT" || fmID == "mdMAPsArea")
				{
					$("."+fmID+"cn input").first().focus();
				}
				
				if(fmID == "mdMAPsPurPoseSD")
				{
					$(id).parent().removeClass("astDINactive");
					$(id).parent().parent().addClass("astDINactive");
					
					$(".dfLocationINFOs").addClass("dfLocationINFOsHIDe");
					$(".mdMAPschBOxsinLNk").css({'margin-top':'240px'});
				}
			}
			
		}
		else if(fm == "mdMAPDrOPs")
		{
			$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDnones");
			$(".mdMAPSedownlabel").removeClass("astDINactive");
			$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDINactive");
				
			if($("."+fmLst).hasClass("astDnone"))
			{
				$(".mdMAPDrOPcontainer .mdMAPsearchLst").addClass("astDnone");
				$("."+fmLst).removeClass("astDnone");
				$(".mdclear.mdMAPsearchLst").html("");
				$(".mdclear.mdMAPsearchLst").addClass("astDnone");
			}
			else
			{
				$(".mdMAPDrOPcontainer .mdMAPsearchLst").addClass("astDnone");
				$("."+fmLst).addClass("astDnone");
				$(".mdclear.mdMAPsearchLst").html("");
				$(".mdclear.mdMAPsearchLst").addClass("astDnone");
			}
		}
		else if(fm == "mdMAPtabs")
		{
			$(".mdMAPSedowncnt.mdMAPSedowntabs").addClass("astDnone");
			$("."+fb).removeClass("astDnone");
			$(".mdMAPSedowncntabs a.mdMAPsearchLnk").removeClass("astDTABactive");
			$(id).addClass("astDTABactive");
			
		}
		else if(fm == "mdMAPdone")
		{
			fmLst = $(id).attr("fmLst");
			fbset = $(id).attr("fbset");
			fbs   = $(id).attr("fbs");
			
			$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDnones");
			$(".mdMAPSedowncn.mdMAPSedownbd").removeClass("astDINactive");
			$(".mdMAPSedownlabel").removeClass("astDINactive");
			
			$(".mdMAPSedowncnt.mdMAPSedowntabs").addClass("astDnone");
			$(".mdMAPSedowncnt.mdMAPSedowntabs").first().removeClass("astDnone");
			
			mdMAPSechoosess(fmID,fb,fbs,fbset,fmLst,1);
		}
	    else if(fm == "mdMAPsin")
		{
			mdCLOsOPtions("mdUsROPTionPARent","mdMDLRiGHtzero");
			mdUseRwdkAction("","mdclose");
			$(".mdUsROPTHsiGnLnk").click();
		}
	
	}
	
	function mdMAPSechoose(id)
	{
		let fm, fb, fValue, fmLst;
		    fm     = $(id).attr("fm");
			fValue = $(id).attr("fValue");
			fbset  = $(id).attr("fbset");
		    fmLst  = fm+"Lst";
				
		if($(id).hasClass("astNWVLUe"))
		{
			$(id).removeClass("astNWVLUe");
		} 
		else
		{
			if(fm == "mdMAPsPurPose" || fm == "mdMAPsPurPoseSD")
			{
				$(".mdMAPsPurPoseLst a.mdMAPsearchLnk").removeClass("astNWVLUe");
				$(".mdMAPsPurPoseSDLst a.mdMAPsearchLnk").removeClass("astNWVLUe");
			}
			
			$(id).addClass("astNWVLUe");
		}
		
		setTimeout(function()
		{
			mdMAPSechoosess(fm,"","",fbset,fmLst,0);
		},100);
	}
	
	function mdMAPSechoosess(fm,fb,fbs,fbset,fmLst,fbx)
	{
		let fmCLASS, fmVALUe, fmVALUes = [],
		    fmVALUDes = [], fmVALUTes = [], 
			fbsets, fbstBths, fbstBeds, fmVLUes,
			mdMAPsSizeVLUe;
		
		    mdMAPsSizeVLUe = $(".mdMAPsSizeVLUe").val();
		    fmCLASS = fm+"cn";
			fmLst = fm+"Lst";
				
		if(fm == "mdMAPsPrice" || fm == "mdMAPsArea" || fm == "mdMAPsPricePMFT")
		{
			if($("."+fmLst+" input.mdMAPsearchLnk").first().val() == "")
			{
				$("."+fmLst+" input.mdMAPsearchLnk").first().val(0);
			}
			
			$("."+fmLst+" input.mdMAPsearchLnk").each(function()
			{
				fmVALUe = $(this).val();
				fmVALUes.push(fmVALUe);
			});
		}
		else
		{
			$("."+fmLst+" a.mdMAPsearchLnk.astNWVLUe").each(function()
			{ 
				fmVALUe = $(this).attr("fValue");
				fmVALUes.push(fmVALUe);
			});
		}
		
		if(fbx == 1)
		{
			if(fbs == "done")
		    {
				if(fm == "mdMAPsBeDsTHs")
				{
					fbsets   = fbset.split("|");
					fbstBths = fbsets[0];
					fbstBeds = fbsets[1];
					
					$(".mdMAPsBeDsLst a.mdMAPsearchLnk.astNWVLUe").each(function()
			        {
					    fmVALUe = $(this).attr("fValue");
					    fmVALUDes.push(fmVALUe);
					});
					
					$(".mdMAPsTHsLst a.mdMAPsearchLnk.astNWVLUe").each(function()
			        {
					    fmVALUe = $(this).attr("fValue");
					    fmVALUTes.push(fmVALUe);
					});
				
					$("."+fbstBeds).val(fmVALUDes);
					$("."+fbstBths).val(fmVALUTes);
					
					$("input."+fm).val("Beds("+fmVALUDes+")/Baths("+fmVALUTes+")");
				}
				else if(fm == "mdMAPsPurPose" || fm == "mdMAPsPurPoseSD")
				{
					$("."+fmLst+" a.mdMAPsearchLnk.astNWVLUe").each(function()
			        {
				        fmVLUes = $(this).attr("fb");
				        if(fmVLUes == "market")
				        {
					        fmVALUe = $(this).attr("fValue");
				            fmVALUDes.push(fmVALUe);
						}
				        else if(fmVLUes == "ded")
				        {
					        fmVALUe = $(this).attr("fValue");
				            fmVALUTes.push(fmVALUe);
						}
				
				         
					});
					
					if(fmVALUDes == "")
					{
						fmVALUDes.push(",");
					}
					
					fmVALUess = fmVALUDes+"|"+fmVALUTes;
					$("."+fbset).val(fmVALUess);
					
					$("span.mdMAPsPurPoseSDtitle").text(fmVLUes);
				    $("input."+fm).val(fmVALUes);
					
					if(fm == "mdMAPsPurPose")
					{
						$("input.mdMAPsPurPoseSD").val(fmVALUes);
					}
					else if(fm == "mdMAPsPurPoseSD")
					{
						$("input.mdMAPsPurPose").val(fmVALUes);
					}
					
					$(".dfLocationINFOs").removeClass("dfLocationINFOsHIDe");
				}
				else if(fm == "mdMAPsPricePMFT")
				{  
					$("."+fbset).val(fmVALUes);
				    $("input."+fm).val(fmVALUes+"/"+mdMAPsSizeVLUe);
				}
				else
				{
					$("."+fbset).val(fmVALUes);
				    $("input."+fm).val(fmVALUes);
				}
			}
		    else
		    {
				$("."+fmLst+" a.mdMAPsearchLnk").removeClass("astNWVLUe");
				if(fm == "mdMAPsBeDsTHs")
				{
					fbsets   = fbset.split("|");
					fbstBths = fbsets[0];
					fbstBeds = fbsets[1];
					
					$("."+fbstBeds).val("");
					$("."+fbstBths).val("");
				    $("input."+fm).val(fb);
				}
				else if(fm == "mdMAPsPrice" || fm == "mdMAPsArea" || fm == "mdMAPsPricePMFT")
				{
					$("."+fmLst+" input.mdMAPsearchLnk").val("");
					$("."+fbset).val("");
					
					if(fm == "mdMAPsPricePMFT")
					{
						$("input."+fm).val(fb+"/"+mdMAPsSizeVLUe);
					}
					else
					{
						$("input."+fm).val(fb);
					}
				}
				else if(fm == "mdMAPsPurPose" || fm == "mdMAPsPurPoseSD")
				{
					$("."+fbset).val("Sale|");
				    $("input."+fm).val(fb);
					
					if(fm == "mdMAPsPurPose")
					{
						$("input.mdMAPsPurPoseSD").val(fb);
					}
					else if(fm == "mdMAPsPurPoseSD")
					{
						$("input.mdMAPsPurPose").val(fb);
					}
					
					$(".dfLocationINFOs").removeClass("dfLocationINFOsHIDe");
				}
				else if(fm == "mdMAPsReTYPes")
				{
					$(".mdMAPsearchAPRTLnk").addClass("astNWVLUe");
					fb = $(".mdMAPsearchAPRTLnk").attr("fValue");
					$("."+fbset).val(fb);
				    $("input."+fm).val(fb);
				}
				else
				{
					$("."+fbset).val("");
				    $("input."+fm).val(fb);
				}
			}
		    
			mdReSeTmaP();
		}
	}
	
	function mdDTLIMITton(id)
	{
		let fm;
		    fm = $(id).attr("fm");
			
			if(fm == "mdLMt")
			{
				mdLOADTbLe();
			}			 
	}
	
	function mdDTLIMITations(evt,id)
	{
		
		let fmVALUe, fmVALUes;
		    
			fmVALUe = $(id).val();
			
			if(fmVALUe != "")
			{
				fmVALUes = '<option value="'+fmVALUe+'">'+fmVALUe+'</option>';
				$(".dataTables_length select").html(fmVALUes);
			}
			
			if(evt.keyCode == 13)
			{
				if(fmVALUe != "")
			    {
					fmVALUes = '<option value="'+fmVALUe+'">'+fmVALUe+'</option>';
				    $(".dataTables_length select").html(fmVALUes);
					
				    mdLOADTbLe();
				}
			}
			
	}
	
	function mdLOADhtmlTbLe()
	{
		let dfAction, mdMAPscurrencY, mdMAPscuncYVLUe;
		 
		    dfAction        = "mdTBLehtml"
		    mdMAPscurrencY  = $(".mdMAPscurrencY").val();
			mdMAPscuncYVLUe = $(".mdMAPscurrencYVLUe").val();
		 
		    $(".mdTBLePARent").html('<div class="astFLex mdLOADhtmlTbLe"></div>');
		    $.ajax({
				url:'mdReQuests/mdReQhtml/mdReQhtable.php',
				method:'POST',
				data:{dfAction:dfAction, 
				      mdMAPscurrencY:mdMAPscurrencY,
					  mdMAPscuncYVLUe:mdMAPscuncYVLUe},
				beforeSend:function()
				{
					$(".mdLOADhtmlTbLe").html("<b>LOADING TABLE</b>");
				},
				success:function(mdResult)
				{
					setTimeout(function()
					{
						$(".mdLOADhtmlTbLe").remove();
						$(".mdTBLePARent").html(mdResult);
						mdLOADTbLe();
					},100);
				}
			});
		
	}
	///////
	function mdLOADTbLe()
	{
		let mdTBLe,dfAction, mdtitle, mdDTLimits,
		    mdMAPscountries, mdMAPscities, mdMAPsdistrict, mdMAPsareas, mdMAPsaddress ,mdMAPsbuilds,
			mdMAPsPname, mdMAPsSize, mdMAPscurrencY, mdMAPssearchBOx,
			mdSROsaleVLUes ,mdSResDNeVLUes ,mdSBedsVLUes ,mdSBthsVLUes,
			mdSPricesVLUes ,mdSAreasVLUes, mdfGeTzOooOm,
			mdastmnPrice,mdastmxPrice, mdSPricPMTsVLUs, jsonData, 
			mdUNLOCkVALUes, mdsearchLstPAsnone, mdsearchLstOPsnone;
		
		    jsonData = "";
		    dfAction = "mdSHOWTBLe";
			
			mdMAPscountries = $(".mdMAPscountries").val();
			mdMAPscities    = $(".mdMAPscities").val();
			mdMAPsdistrict  = $(".mdMAPsdistrict").val();
			mdMAPsareas     = $(".mdMAPsareas").val();
			mdMAPsaddress   = $(".mdMAPsaddress").val();
			mdMAPsbuilds    = $(".mdMAPsbuilds").val();
			mdMAPsPname     = $(".mdMAPsPname").val();
			mdMAPssearchBOx = $(".mdMAPssearchBOx").val();
			mdMAPsSize      = $(".mdMAPsSize").val();
			mdMAPscurrencY  = $(".mdMAPscurrencY").val();
			
			mdMAPsSizeVLUe      = $(".mdMAPsSizeVLUe").val();
			mdMAPscurrencYVLUe  = $(".mdMAPscurrencYVLUe").val();
			
			mdastmnPrice    = mdSPricePMTsVLUs("min");
		    mdastmxPrice    = mdSPricePMTsVLUs("max");
			
			mdSROsaleVLUes  = $(".intsrSROsaleVLUes").val();
			mdSResDNeVLUes  = $(".intsrSResDNeVLUes").val();
			mdSBedsVLUes    = $(".intsrSBedsVLUes").val();
			mdSBthsVLUes    = $(".intsrSBthsVLUes").val();
			mdSPricesVLUes  = $(".intsrSPricesVLUes").val();
			mdSAreasVLUes   = $(".intsrSAreasVLUes").val();
			
			mdfGeTzOooOm    = $("#defGeTzOooOm").val();
			mdDTLimits      = $(".mdDTLimits").val();
			
			mdUNLOCkVALUes  = $(".mdUNLOCkVALUes").val();
			mdsearchLstPAsnone  = $(".mdsearchLstPAsnone").val();
			mdsearchLstOPsnone  = $(".mdsearchLstOPsnone").val();

			if($.fn.dataTable.isDataTable("#mdMAPSelmorestb"))
			{
				$("#mdMAPSelmorestb").DataTable().destroy();
			}
			
		    mdTBLe = $("#mdMAPSelmorestb").DataTable({
				scrollX:true,
				processing:true,
				fixedHeader:true,
				serverSide:true,
				orderCellsTop:true,
				ajax:{
					url:'mdReQuests/mdReQPHP/mdReQmaPs.php',
					method:'POST',
					data:{dfAction:dfAction, mdMAPscountries:mdMAPscountries, mdMAPscities:mdMAPscities, 
					      mdMAPsdistrict:mdMAPsdistrict, mdMAPsareas:mdMAPsareas, mdMAPsaddress:mdMAPsaddress,
						  mdMAPsbuilds:mdMAPsbuilds, mdMAPsPname:mdMAPsPname, mdMAPsSize:mdMAPsSize, 
						  mdMAPscurrencY:mdMAPscurrencY, mdMAPssearchBOx:mdMAPssearchBOx,
			              mdSROsaleVLUes:mdSROsaleVLUes, mdSResDNeVLUes:mdSResDNeVLUes, mdSBedsVLUes:mdSBedsVLUes,
						  mdSBthsVLUes:mdSBthsVLUes,mdSPricesVLUes:mdSPricesVLUes,mdSAreasVLUes:mdSAreasVLUes, 
						  mdfGeTzOooOm:mdfGeTzOooOm,mdMAPsSizeVLUe:mdMAPsSizeVLUe,mdMAPscurrencYVLUe:mdMAPscurrencYVLUe, 
						  mdastmnPrice:mdastmnPrice,mdastmxPrice:mdastmxPrice,mdDTLimits:mdDTLimits,
						  mdUNLOCkVALUes:mdUNLOCkVALUes,mdsearchLstPAsnone:mdsearchLstPAsnone,
						  mdsearchLstOPsnone:mdsearchLstOPsnone
						},
				},
				order:[[1,'DESC']],
				columnDefs:[{
					orderable:true,
				}],
				dom:'B1frtip',
				buttons:['copy', 'excel', 'csv', 'print'],
				pageLength:mdDTLimits
			});	
		
			mdDTLIMITation = '<div class="dataTables_length astDnone" id="mdMAPSelmorestb_length">'+
			                    '<label>'+
								    '<select name="mdMAPSelmorestb_length" aria-controls="mdMAPSelmorestb" class="">'+
									    '<option value="'+mdDTLimits+'">'+mdDTLimits+'</option>'+
									'</select>'+
								'</label>'+
							 '</div>';
							 
			$(".dataTables_wrapper div.dataTables_filter").before(mdDTLIMITation);
			
			mdTBLe.columns().every(function () 
			{
                let mdtable = this;
                $('input', this.footer()).on('keyup change', function () 
				{
                    if (mdtable.search() !== this.value) 
					{
                    	mdtable.search(this.value).draw();
                    }
                });
				
				$('input', this.footer()).each(function () 
				{
                    let fmVAUes = $(this).val();
					    if(fmVAUes != "")
						{
							$(this).keyup();
						}
                });
				
            });
			
			mdTBLe.column( 5 ).visible(false);
			mdTBLe.column( 6 ).visible(false);
			mdTBLe.column( 8 ).visible(false);
			mdTBLe.column( 13 ).visible(false);
			mdTBLe.column( 15 ).visible(false);
			mdTBLe.column( 16 ).visible(false);
			mdTBLe.column( 17 ).visible(false);
			
			
		    $('a.mdMAPschLnks').on( 'click', function (e) 
			{
                e.preventDefault();
				
				let mdcolumns, mdtheader;
				
                    mdcolumns = mdTBLe.column( $(this).attr('data-column') );
                    mdcolumns.visible( ! mdcolumns.visible() );
		            
					mdtheader = $(this).attr('data-column');
		            if(mdTBLe.column( $(this).attr('data-column') ).visible() == true)
		            {
						$(this).addClass("mdMAPActive");
			            $("#mdMAPSelmorestb .searchHeader #sr"+mdtheader).show();
					}
		            else
		            {
						$(this).removeClass("mdMAPActive");
			            $("#mdMAPSelmorestb .searchHeader #sr"+mdtheader).hide();
					}
			});
	}
	
	function mdOPeNLnKs(id)
	{
		let mdLnk;
		    mdLnk = $(id).attr("mdLnk");
			
			if(mdLnk !="")
			{
				window.open(mdLnk);
			}
	}
	
	function mdLOADTBLeKeYs()
	{
		setTimeout(function()
		{
			mdLOADTbLe();
		},10);
	}
	
	function mdUNLOCkKeYs(id)
	{
		let fm, mdUNLOCkPass, mdUNLOCkVALUes;
		    fm = $(id).attr("fm");
			
			if(fm != "mdClose" || fm != "mdDone")
			{
				$(".mdNormalKeYs").removeClass("mdActiveKeYs");
				$(id).addClass("mdActiveKeYs");
			}
			
			if(fm == "mdMain")
			{
				$(".mdUNLOCkVALUes").val(fm);
				mdLOADTBLeKeYs();
			}
			else if(fm == "mdSimPle")
			{
				$(".mdUNLOCkVALUes").val(fm);
				mdLOADTBLeKeYs();
			}
			else if(fm == "mdOPtions")
			{
				$(".mdUNLOCkVALUes").val(fm);
				$(".mdUNLOCkKeYss").addClass("mdUNlockLenGths");
			}
			else if(fm == "mdLink")
			{
				$(".mdUNLOCkVALUes").val(fm);
				$(".mdUNLOCkKeYss").addClass("mdUNlockLenGths");
			}
			else if(fm == "mdClose")
			{
				setTimeout(function()
				{
					$(".mdUNLOCkPass").val("");
					$(".mdUNLOCkKeYss").removeClass("mdUNlockLenGths");
				},100);
			}
			else if(fm == "mdDone")
			{
				mdUNLOCkVALUes = $(".mdUNLOCkVALUes").val();
				mdUNLOCkPass   = $(".mdUNLOCkPass").val();
				
				if(mdUNLOCkPass == "1973")
				{
					if(mdUNLOCkVALUes == "mdLink")
					{
						if($(".mdOPeNLnKs").hasClass("mdsearchLstnone"))
					    {
						    $(".mdOPeNLnKs").removeClass("mdsearchLstnone");
							$(".mdsearchLstPAsnone").val("");
						}
					    else
					    {
						    $(".mdOPeNLnKs").addClass("mdsearchLstnone");
							$(".mdsearchLstPAsnone").val("mdsearchLstnone");
						}
					}
					else if(mdUNLOCkVALUes == "mdOPtions")
					{
						if($(".mdOPeNOPtions").hasClass("mdsearchLstnone"))
					    {
						    $(".mdOPeNOPtions").removeClass("mdsearchLstnone");
							$(".mdsearchLstOPsnone").val("");
						}
					    else
					    {
						    $(".mdOPeNOPtions").addClass("mdsearchLstnone");
							$(".mdsearchLstOPsnone").val("mdsearchLstnone");
						}
					}
					
					setTimeout(function()
					{
						$(".mdUNLOCkPass").val("");
						$(".mdUNLOCkKeYss").removeClass("mdUNlockLenGths");
					},100);
				}	
			}
	}
	
	//////
	function mdOPeNOPtions(id)
	{
		let fm, mdID, dfAction, dfKNd, 
		    mdMAPscurrencY, mdMAPsSizeVLUe;
			
		    fm    = $(id).attr("fm");
			mdID  = $(id).attr("mdID");
			mdKNd = $(id).attr("mdKNd");
			dfKNd = $(id).attr("dfKNd");
			
			mdMAPscurrencY  = $(".mdMAPscurrencY").val();
			mdMAPsSizeVLUe      = $(".mdMAPsSizeVLUe").val();
			
			//mdcontrol
			dfAction = "mdTBLeAction";
			
			$(".mdVALUeDtKNd").val("");
			$(".mdVALUeDtAction").val("");
			$(".mdVALUeDtID").val("");
			
			$(".mdVALUeDtKNd").val(mdKNd);
			$(".mdVALUeDtAction").val(fm);
			$(".mdVALUeDtID").val(mdID);
			
			$(".mdOPtionTiTLe").html("");
			$(".mdTBLeOPTionPBODY").html("");
			
			if(dfKNd == "mdhtml")
			{
				if(fm == "edt")
				    $(".mdOPtionTiTLe").html("Update Data"); 
				else if(fm == "add")
					$(".mdOPtionTiTLe").html("Add new Data");
			    
				
				mdCLOsOPtions("mdTBLeOPTionPARent","mdMDLRiGHtzero");
			}
			else if(dfKNd == "mdcontrol")
			{
				mdOPTionActsave("save");
			}
			
			if(dfKNd == "mdhtml")
			$.ajax(
			{
				url:'mdReQuests/mdReQPHP/mdReQmaPs.php',
				method:'POST',
				data:{fm:fm,mdID:mdID,dfAction:dfAction,dfKNd:dfKNd,
				      mdMAPscurrencY:mdMAPscurrencY,mdMAPsSizeVLUe:mdMAPsSizeVLUe},
				beforeSend:function()
				{
					if(dfKNd == "mdhtml")
					{
						mdOPtionLOAd("mdTBLeOPTionPBODY");
					}
				},
				success:function(mdResults)
				{
					if(dfKNd == "mdhtml")
					{
						$(".mdLOADhtmlTbLe").remove();
						$(".mdTBLeOPTionPBODY").html(mdResults);
						mdIniteTHISmaP();
						
					}
					
					$(".mdOPtionNeWLNks").addClass("mdNOcursor");
					if(fm == "add")
					{
					    $(".mdOPtionNeWLNks").removeClass("mdNOcursor");
					}
				}
			});
	
	  
	}
	
	function mdOPTionAction(id)
	{
		let fm;
		    fm = $(id).attr("fm");
			
			if(fm == "close")
			{
				$(".mdVALUeDtKNd").val("");
			    $(".mdVALUeDtAction").val("");
			    $(".mdVALUeDtID").val("");
				mdCLOsOPtions("mdTBLeOPTionPARent","mdMDLRiGHtzero");
			}
			else if(fm == "mdsinclose")
			{
				mdCLOsOPtions("mdUsROPTionPARent","mdMDLRiGHtzero");
				mdUseRwdkAction("","mdclose");
			}
			else if(fm == "save")
			{
				mdOPTionActsave(fm);
			}
			else if(fm == "new")
			{
				$(".mdPROFORmtoAction input.mdVALUeReset").val("");
			}
	}
	
	function mdOPTionActsave(mdAction)
	{
		let mdKNd, fm, mdID, mdResults,
		    dfAction, dfKNd, mdFORm, mdTeXt, mdTstatus;
		
		    mdKNd    = $(".mdVALUeDtKNd").val();
			fm       = $(".mdVALUeDtAction").val();
			mdID     = $(".mdVALUeDtID").val();
			
			dfAction = "mdTBLeAction";
			dfKNd    = "mdcontrol"
			
			if(fm == "edt" || fm == "add")
			{
			    
			    $(".mdFORMsthsID").val(mdID);
			    $(".mdFORMsthsFM").val(fm);
			    $(".mdFORMsmdKNd").val(mdKNd);
			    $(".mdFORMsmdAction").val(mdAction);
			    $(".mdFORMsdfAction").val(dfAction);
			    $(".mdFORMsdfKNd").val(dfKNd);
			
			    mdOPTionActdone(fm); 
			}
			else if(fm == "dlt" || fm == "share")
			{
				$.ajax(
			    {
				    url:'mdReQuests/mdReQPHP/mdReQProPertYies.php',
				    method:'POST',
				    data:{dfAction:dfAction, dfKNd:dfKNd,mdKNd:mdKNd, fm:fm,
					      mdID:mdID, mdAction:mdAction},
				    beforeSend:function()
				    {
				        $(".mdMAPSelmores").addClass("mdNOcursor");
					},
				    success:function(mdResult)
				    {
					    mdResult  = mdResult.trim();
					    mdResults = mdResult.split("|");
					    if(mdResults[0])
					    {
						    mdsucessBOXs(mdResults[1],"alert-success");
						
						    if(fm == "dlt" || fm == "share")
						    {
							    $(".mdVALUeDtKNd").val("");
			                    $(".mdVALUeDtAction").val("");
			                    $(".mdVALUeDtID").val("");
							
							    if(fm == "dlt")
							        $(".mdReMOVeROW"+mdID).parent().parent().remove();
							}
						}
					    else
					    {
						    mdsucessBOXs(mdResults[1],"alert-danger");
						}
					
					    setTimeout(function()
					    {
						    $(".mdMAPSelmores").removeClass("mdNOcursor");
						},3000);
					}
				});
			}
			
	}
	
	function mdOPTionActdone(fm)
	{
		let mdKNd, mdID, mdResults = "",
		    dfAction, dfKNd, mdFORm, mdTeXt, mdTstatus;
			
		    mdTstatus = 0;
			mdTeXt = "fill all Required fields !";
			$(".mdPROFORmtoAction input.mdVLeNOtNull,.mdPROFORmtoAction select.mdVLeNOtNull").each(function(e)
			{
				if($(this).val() == "")
				{
					mdfillBOXs($(this),mdTeXt,"alert-danger");
					mdTstatus = 1;
					return false;
				}
			});
			
			mdFORm = $(".mdPROFORmtoAction").serializeArray();
			
			if(mdTstatus != 1)
			$.ajax(
			{
				url:'mdReQuests/mdReQPHP/mdReQProPertYies.php',
				method:'POST',
				data:mdFORm,
				cache:false,
				beforeSend:function()
				{
				    $(".mdTBLeOPTionPARent").addClass("mdNOcursor");
				},
				success:function(mdResult)
				{
					console.log("<br> Results:"+mdResult);
					mdResult  = mdResult.trim();
					mdResults = mdResult.split("|");
					if(mdResults[0] == 1)
					{
						mdsucessBOXs(mdResults[1],"alert-success");
						
						if(fm == "dlt" || fm == "edt")
						{
							$(".mdVALUeDtKNd").val("");
			                $(".mdVALUeDtAction").val("");
			                $(".mdVALUeDtID").val("");
							
							if(fm == "dlt")
							    $(".mdReMOVeROW"+mdID).parent().parent().remove();
							else if(fm == "edt")
								mdLOADTbLe();
							
							setTimeout(function()
							{
								mdCLOsOPtions("mdTBLeOPTionPARent","mdMDLRiGHtzero");
							},2000);
								
						}
						else if(fm == "add")
						{
							$(".mdPROFORmtoAction input.mdVALUeReset").val("");
							mdLOADTbLe();
						}
						
					}
					else
					{
						mdsucessBOXs(mdResults[1],"alert-danger");
					}
					
					setTimeout(function()
					{
						$(".mdTBLeOPTionPARent").removeClass("mdNOcursor");
					},3000);
				}
			});
	
	}
	
	function mdCLOsOPtions(mdModal,mdclass)
	{
		if($("."+mdModal).hasClass(mdclass))
		{
			$("."+mdModal).removeClass(mdclass);
		}
		else
		{
			$("."+mdModal).addClass(mdclass);
		}
	}
	
	function mdOPtionLOAd(mdModal)
	{
		$("."+mdModal).html('<div class="astFLex mdLOADhtmlTbLe"></div>');
		$(".mdLOADhtmlTbLe").html("<b>LOADING...</b>");
	}
	
	function mdIsPRIceVALUe(evt,id)
	{
		let fm, mdCode;
		
		    fm      = $(id).attr("mdNumKNd");
			mdCode  = evt.keyCode;
			 
			if(fm == "mdPrice" || fm == "mdSize" || fm == "mdLAT" || fm == "mdLNG")
			{
				if(mdCode > 31 && (mdCode != 46 &&(mdCode < 48 || mdCode > 57)))
                    return false;	
				return true;
			}
	}
	
	function mdONkeYINPTFOrm(evt,id)
	{
		let fm, mdFPrice, mdRPrice, mdSizeFT = "", mdSize = "", 
		    mdPriceFT = "", mdPriceMT = "", mdPrice;
		    fm = $(id).attr("fm");
			
			if(evt.keyCode == 13)
		    {
			    evt.preventDefault();
			}
			
			if(fm == "mdPrice")
			{
				mdPrice  = $(".mdInPrice").val();
				mdRPrice = mdFORmatNUMeR(fm,mdPrice);
				mdFPrice = mdFORmatPRIce(mdRPrice);
				
				mdSizeFT = $(".mdInSizeFT").val();
				
				if(mdSizeFT != "" && mdRPrice != "")
				{
					mdPriceFT = mdRPrice / mdSizeFT;
					if(mdPriceFT != "")
						mdPriceMT = mdPriceFT * 10.7641;
					
					mdPriceFT = mdFORmatNUMeR(fm,mdPriceFT);
					mdPriceMT = mdFORmatNUMeR(fm,mdPriceMT);
					
					mdPriceFT = mdFORmatPRIce(mdPriceFT);
					mdPriceMT = mdFORmatPRIce(mdPriceMT);
				}
				
				$(".mdInPrice").val(mdFPrice);
				$(".mdInPricePFT").val(mdPriceFT);
				$(".mdInPricePMT").val(mdPriceMT);
			}
			else if(fm == "mdSize")
			{
				mdSize   = $(".mdInSize").val();
				mdSizeFT = mdSize * 10.7641;
				mdSizeFT = mdFORmatNUMeR(fm,mdSizeFT);
				
				$(".mdInSizeFT").val(mdSizeFT);
			}
	}
	
	function mdFORmatNUMeR(fm,md)
	{
		let mdFormt, mdVALUe = "", mdVFALUe = "", mdFVALUe;
		
		    mdFVALUe = "";
		    if(fm == "mdPrice")
		    {
				if(md.length > 3)
				    mdVFALUe = md.replace(/[,]/g,'');
				else
					mdVFALUe = md;
				
				mdVFALUe = parseFloat(mdVFALUe);
			    mdFVALUe = L.Util.formatNum(mdVFALUe,0);
			}
			else if(fm == "mdSize")
			{
				mdFVALUe = L.Util.formatNum(md,0);
			}
			
		return mdFVALUe;
	}
	
	function mdFORmatPRIce(mdVALUe)
	{
		let  mdVFALUe, mdFVALUe;
		
		    mdVFALUe = new Intl.NumberFormat();
		    mdFVALUe = mdVFALUe.format(mdVALUe);
			
		return mdFVALUe;
	}
	
	/////////////
	function mdLOADINGLIss()
	{
		let mdLOADINGLIs ;
		    mdLOADINGLIs = '<li class="astFLex"><a href="javascript:void(0)" class="astFLex"><span>Searching...</span></a></li>';
			
		return mdLOADINGLIs;
	}
	
	function mdMAPchsearchinGs(id)
	{
		
	}
	
	function mdMAPksearchinGs(evt,id)
	{
		let fm, fmID, fmLst, fmVALUe;
		
		    fm = $(id).attr("fm");
			
			fmVALUe = $(id).val();
			if(evt.keyCode == 13)
			{
				if(fm == "mdMAPsearch")
				if(fmVALUe != "")
				{
					$(id).blur();
					$(".mdMAPscurrencY").focus();
					$(".mdclear.mdMAPsearchLst").addClass("astDnone");
			        $(".mdclear.mdMAPsearchLst").html("");
					$(".mdMAPsseArchBOxsLNk").click();
					
					return false;
				}
			}
			else if(fmVALUe != "")
			{
				if(fm == "mdMAPsearch")
				{
					setTimeout(function()
					{
						mdMAPksearchinGsss(id);
					},500);
				}
			}
	}
	
	function mdMAPksearchinGsss(id)
	{
		let fm, fmID, fmLst, fmKNd, dfAction, mdMAPscountries, mdMAPscities, mdMAPsdistrict, 
            mdMAPsareas, mdMAPsaddress, mdMAPsbuilds, mdMAPsPname, 
            mdMAPssearchBOx, mdMAPsSize, mdMAPscurrencY, mdMAPsSizeVLUe,
            mdMAPscurrencYVLUe, mdastmnPrice, mdastmxPrice, mdSROsaleVLUes, 
  			mdSResDNeVLUes, mdSBedsVLUes, mdSBthsVLUes, mdSPricesVLUes, mdSAreasVLUes; 
		
		    fm    = $(id).attr("fm");
			fmID  = $(id).attr("fmID");
			fmLst = $(id).attr("fmLst");
			fmKNd = $(id).attr("fmKNd");

			dfAction        = "mdsearch";
			mdMAPscountries = $(".mdMAPscountries").val();
			mdMAPscities    = $(".mdMAPscities").val();
			mdMAPsdistrict  = $(".mdMAPsdistrict").val();
			mdMAPsareas     = $(".mdMAPsareas").val();
			mdMAPsaddress   = $(".mdMAPsaddress").val();
			mdMAPsbuilds    = $(".mdMAPsbuilds").val();
			mdMAPsPname     = $(".mdMAPsPname").val();
			mdMAPssearchBOx = $(".mdMAPssearchBOx").val();
			mdMAPsSize      = $(".mdMAPsSize").val();
			mdMAPscurrencY  = $(".mdMAPscurrencY").val();
			
			mdMAPsSizeVLUe      = $(".mdMAPsSizeVLUe").val();
			mdMAPscurrencYVLUe  = $(".mdMAPscurrencYVLUe").val();
			
			mdastmnPrice    = mdSPricePMTsVLUs("min");
		    mdastmxPrice    = mdSPricePMTsVLUs("max");
			
			mdSROsaleVLUes  = $(".intsrSROsaleVLUes").val();
			mdSResDNeVLUes  = $(".intsrSResDNeVLUes").val();
			mdSBedsVLUes    = $(".intsrSBedsVLUes").val();
			mdSBthsVLUes    = $(".intsrSBthsVLUes").val();
			mdSPricesVLUes  = $(".intsrSPricesVLUes").val();
			mdSAreasVLUes   = $(".intsrSAreasVLUes").val();
			
			mdLOADINGLIs    = mdLOADINGLIss();
			
			$(".mdclear.mdMAPsearchLst").addClass("astDnone");
			$(".mdclear.mdMAPsearchLst").html("");
			$("."+fmLst).removeClass("astDnone");
			$("."+fmLst).html(mdLOADINGLIs);
			
			$.ajax({
				url:'mdReQuests/mdReQPHP/mdReQmaPs.php',
				method:'POST',
				data:{fm:fm,fmID:fmID,fmLst:fmLst,fmKNd:fmKNd,
				      dfAction:dfAction, mdMAPscountries:mdMAPscountries, mdMAPscities:mdMAPscities, 
					  mdMAPsdistrict:mdMAPsdistrict, mdMAPsareas:mdMAPsareas, mdMAPsaddress:mdMAPsaddress,
					  mdMAPsbuilds:mdMAPsbuilds, mdMAPsPname:mdMAPsPname, mdMAPsSize:mdMAPsSize, 
				      mdMAPscurrencY:mdMAPscurrencY,mdMAPssearchBOx:mdMAPssearchBOx, 
					  mdMAPsSizeVLUe:mdMAPsSizeVLUe, mdMAPscurrencYVLUe:mdMAPscurrencYVLUe, 
					  mdastmnPrice:mdastmnPrice, mdastmxPrice:mdastmxPrice, mdSROsaleVLUes:mdSROsaleVLUes, 
  			          mdSResDNeVLUes:mdSResDNeVLUes, mdSBedsVLUes:mdSBedsVLUes, 
					  mdSBthsVLUes:mdSBthsVLUes, mdSPricesVLUes:mdSPricesVLUes, mdSAreasVLUes:mdSAreasVLUes},
				beforeSend:function()
				{
					$("."+fmLst).html(mdLOADINGLIs);
				},
				success:function(mdResults)
				{
					$("."+fmLst).html(mdResults);
				}
			});
	}

	function mdMAPksearchclick(id)
	{
		let fm, fmID, fmLst, fmKNd, fmVALUe, fmKeYs, fmVALUes = [];
		
		    fm      = $(id).attr("fm");
			fmID    = $(id).attr("fmID");
			fmLst   = $(id).attr("fmLst");
			fmKNd   = $(id).attr("fmKNd");
			fmVALUe = $(id).attr("fmVALUe");
			
		if(fm == "mdMAPDrOPs")
		{
			fmKeYs = $(id).attr("fmKeYs");
			
			$("."+fmID).val(fmKeYs);
			$("."+fmID+"VLUe").val(fmVALUe);
			
			$("."+fmLst).addClass("astDnone");
			
			if(fmID == "mdMAPscurrencY")
			{
				$(".mdTBPRchanage").html(fmKeYs);
			}
			
			if(fmID == "mdMAPsSize")
			{
				$(".mdMAPsPricePMFTLst input.mdMAPsearchLnk").each(function()
			    {
				    fmVALUes.push($(this).val());
				});
				
				if(fmVALUes != "" && fmVALUes != ",")
				{
					$("input.mdMAPsPricePMFT").val(fmVALUes+"/"+fmVALUe);
					$("input.mdMAPsPricePMFT").attr("placeholder","Price/"+fmVALUe+"^2");
				}
				else
				{
					$("input.mdMAPsPricePMFT").val("");
					$("input.mdMAPsPricePMFT").attr("placeholder","Price/"+fmVALUe+"^2");
				}
			}
		}
		else
		{
			mdReSeTmaP();
			$("."+fmID).val(fmVALUe);
            $(".mdclear.mdMAPsearchLst").html("");	
			$(".mdclear.mdMAPsearchLst").addClass("astDnone");
		}
			
	}
	
	////////map searchbox//////
	function mdMAPsseArchBOxs(id)
	{
		let fm, mdsearchTYPclicked, fb;
		    fm = $(id).attr("fm");
			fb = $(id).attr("fb");
		
        $(".astDTBLeOFIndxes").addClass("astDTBLIndxs");		
		if(fm == "searchMOBs")
		{
			if(searchMOBs == false)
			{
				mdFXDhidesss(1);
			}
			else
			{
				mdFXDhidesss(0);
			}
		}			
		else
		{
			mdFXDhidesss(0);
			$("#defaultMAP").val("defaultMAP");
			mdsearchTYPclicked = $(".mdsearchTYPclicked").val();
			
			if(fb == "mdRzoom")
			{
				mdReSeTmaP();
			}
			else
			{
				defhEADeRsLst();
			}
			
			if(mdsearchTYPclicked == "searchTB")
			{
		        mdLOADTbLe();
			}
			else
			{
				defMAPLOAD("default");
			}
		}			
	}

	function mdFXDhidesss(fm)
	{
		if(fm == 1)
		{
			$(".mdFXDhidesssss").find("i").removeClass("fa-search");
			$(".mdFXDhidesssss").find("i").addClass("fa-close");
			$(".mdFXDheader div.mdMAPcontainer").removeClass("mdFXDhidesss");
			$(".mdMAPssearchBTNss").removeClass("mdMAPschNONe");
			searchMOBs = true;
		}
		else
		{
			$(".mdFXDhidesssss").find("i").removeClass("fa-close");
			$(".mdFXDhidesssss").find("i").addClass("fa-search");
			$(".mdFXDheader div.mdMAPcontainer").addClass("mdFXDhidesss");
			$(".mdMAPssearchBTNss").addClass("mdMAPschNONe");
			searchMOBs = false;
		}
		
	}
	
	//////////////////////////
	function mdUseRAction(evt,id)
	{
		let md, mdclass;
		    md      = $(id).attr("md");
			mdclass = $(id).attr("mdclass");
			
			if(md == "create" || md == "access" || md == "activate")
			{
				evt.preventDefault();
				mdUseRTkAction(id);
			}
			else if(md == "createTAB" || md == "accessTAB" || md == "activateTAB")
			{
				evt.preventDefault();
				mdUseRTABkAction(id);
			}
			else if(md == "remember")
			{
				
			}
	}
	
	function mdUseRTkAction(id)
	{
		let md, mdclass, mdAction, mdemPtVALue = 0, mdTeXt, mdFORm;
		    md       = $(id).attr("md");
			mdclass  = $(id).attr("mdclass");
			mdAction = $(id).attr("mdAction");
			
			mdTeXt  = "fill all required fields";
			
			$("."+mdclass+" .mdUsrNOnull").each(function(e)
			{
				if($(this).val() == "")
				{
				    mdfillBOXs($(this),mdTeXt,"alert-danger");
					mdemPtVALue = 1;
					return false;
				}
			});
			
			if(mdemPtVALue != 1)
				mdUseRTkDirect(md,mdclass,mdAction);
			
	
	}
	
	function mdUseRTkDirect(md,mdclass,mdAction)
	{
		let mdFORm, mdResults;
		
		    mdFORm = $("."+mdclass).serializeArray();
	
			$.ajax({
				url:'mdReQuests/mdReQPHP/mdReQPHPUsers.php',
				method:'POST',
				data:mdFORm,
				cache:false,
				beforeSend:function()
				{
					$("."+mdclass).addClass("mdNOcursor");
				},
				success:function(mdResult)
				{
					$("."+mdclass).removeClass("mdNOcursor");
					
					mdResults = mdResult.split("|");
					if(mdResults[0] == 1)
					{
						mdsucessBOXs(mdResults[2],"alert-success");
						if(mdResults[1] == "access")
						{
							location.reload();
						}
						else if(mdResults[1] == "activate")
						{
							$(".mdUsROPTHactiveLnk").click();	
						}
						else if(mdResults[1] == "done")
						{
							location.reload();
						}
						else
						{ 
						}
					}
					else
					{
						mdsucessBOXs(mdResults[2],"alert-danger");
					}
				}
			});
	
	}
	
	function mdUseRTABkAction(id)
	{
		let mdAction, md, mdclass, mdOPtion;
		    md       = $(id).attr("md");
			mdclass  = "";
			mdAction = $(id).attr("mdAction");			
			
			if(md == "createTAB" || md == "accessTAB" || md == "activateTAB")
			{
				$(".mdUsROPTPionLst a.mdUsROPTHLnk").removeClass("mdUsROPactive");
				$(id).addClass("mdUsROPactive");
			}
			
			mdUseRwdkAction(md,"mdstart");
			mdOPtion = mdOPtionLOAd("mdUsROPTioncntner");
			$.ajax({
				url:'mdReQuests/mdReQhtml/mdReQUsers.php',
				method:'POST',
				data:{mdAction:mdAction, md:md},
				beforeSend:function()
				{
					$(".mdUsROPTioncntner").html(mdOPtion);
				},
				success:function(mdResult)
				{
					$(".mdLOADhtmlTbLe").remove();
					$(".mdUsROPTioncntner").html(mdResult);
				}
			});
			
	}
	
	function mdUseRwdkAction(md,mdto)
	{
		$(".mdUsROPTioncntner").removeClass("mdUsROPReGTion");
		$(".mdUsROPTPioncnt").removeClass("mdUsROPReGTion");
		
		if(mdto == "mdstart")
		{
			if(md == "createTAB" || md == "accessTAB" || md == "activateTAB")
		    {
			    $(".mdUsROPTioncntner").addClass("mdUsROPReGTion");
			    $(".mdUsROPTPioncnt").addClass("mdUsROPReGTion");
			}
		}
		
	}
	
	
	//////////project/////
	function mdPRoLOads(md, mdKnd, mdResult)
	{
		let mdLOads;
		    mdLOads = '';
			
			if(md == "mdPRohtml")
			{
				if(mdKnd == 0)
				    mdLOads = $(".mdTBLePOPUPcnt").html('<b>LOADING...</b>');
				else if(mdKnd == 1)
				    mdLOads = $(".mdTBLePOPUPcnt").html(mdResult);
			}
			else if(md == "mdPRcode")
			{
				if(mdKnd == 0)
				    mdLOads = $(".mdTBLePOPUPcnt").addClass("mdNOcursor");
				else if(mdKnd == 1)
				    mdLOads = $(".mdTBLePOPUPcnt").removeClass("mdNOcursor");
			}
			
		return mdLOads;
	}
	
	function mdPROJecTAction(id)
	{
		let mdAction, md, mdURL, mdError, mdTeXt, 
		    mdData, mdFORm, mdLOads, mdResults, mdCche;
		    
			mdCche   = "";
			mdError  = 0;
			mdAction = $(id).attr("mdAction");
			md       = $(id).attr("md");
			
			if(mdAction == "mdPRohtml")
			{
				mdCLOsOPtions("mdTBLePOPUPmodal","mdMDLRiGHtzero");
				mdURL = "mdReQuests/mdReQhtml/mdReQUsers.php";				
				mdData = {mdAction:mdAction,md:md};
				
			}
			else if(mdAction == "mdPRcode")
			{
				mdURL = "mdReQuests/mdReQPHP/mdReQPHPUsers.php";
				
				mdFORm = $("#mdTBLePOPUPform").serializeArray();
				mdData = mdFORm;
				mdCche = false;
				mdTeXt = "please fill all required fields !";
				$("#mdTBLePOPUPform input.mdVLeNOtNull").each(function(e)
				{
					if($(this).val() == "")
					{
						mdfillBOXs($(this),mdTeXt,"alert-danger")
						mdError = 1;
						return false;
					}
				});
			}
			else if(mdAction == "mdPRclose")
			{
				mdCLOsOPtions("mdTBLePOPUPmodal","mdMDLRiGHtzero");
				$(".mdTBLePOPUPcnt").html("");
				
				mdError = 1;
				return false;
			}
			
			if(mdError != 1)
			{
				$.ajax({
					url:mdURL,
					method:'POST',
					data:mdData,
					cache:mdCche,
					beforeSend:function()
					{
						mdPRoLOads(mdAction, 0, "");
					},
					success:function(mdResult)
					{
						mdPRoLOads(mdAction, 1, mdResult);
						
						if(mdAction == "mdPRcode")
						{
							mdResults = mdResult.split("|");
							
							if(mdResults[0] == 1)
							{
								mdsucessBOXs(mdResults[1],"alert-success");
								$(".mdInPName").val($(".mdInPRoName").val());
				                $(".mdInPROID").val(mdResults[2]);
								setTimeout(function()
								{
									mdCLOsOPtions("mdTBLePOPUPmodal","mdMDLRiGHtzero");
									$(".mdTBLePOPUPcnt").html("");
								},1000);
							}
							else
							{
								mdsucessBOXs(mdResults[1],"alert-danger");
							}
						}
					}
				});
			}
	}
	
	
	function mdPROJecTsearch(evt,id)
	{
		evt.preventDefault();
		
		let mdAction, md, mdVALUe;
		    
			mdAction = $(id).attr("mdAction");
			md       = $(id).attr("md");
			mdVALUe  = $(id).val();

			if(mdVALUe != "")
			{
				mdPROJecTsrch($(id));
				if(evt.keyCode == 13)
				{
					mdPROJecTsrch($(id));
				}
			}
	}
	
	function mdPROJecTsrch($id)
	{
		let mdAction, md, mdVALUe, mdURL, mdData, mdCche;
		
		    mdAction = $id.attr("mdAction");
			md       = $id.attr("md");
			mdVALUe  = $id.val();
			
		    mdCche = "";
			mdURL  = "mdReQuests/mdReQhtml/mdReQUsers.php";	
			mdData = {mdAction:mdAction, md:md, mdVALUe:mdVALUe};
			
			$(".mdPROJecTsrch").removeClass("astDnone");
		    $.ajax({
				url:mdURL,
                method:'POST',
				data:mdData,
			    cache:mdCche,
				beforeSend:function()
				{
					$(".mdPROJecTsrch").html(mdLOADearchULI());
				},
				success:function(mdResult)
				{
					$(".mdPROJecTsrch").html(mdResult);
				}
			});
	}
	
	function mdPROJecTCHsrch(id)
	{
		setTimeout(function()
		{
			$(".mdPROJecTsrch").addClass("astDnone");
		    //$(".mdPROJecTsrch").html("");
		},5000);
	}
	
	function mdPROJecTCLksrch(id)
	{
		let mdAction, md, mdID, mdVALUe;
		    
			mdAction = $(id).attr("mdAction");
			md       = $(id).attr("md");
			mdVALUe  = $(id).attr("mdVALUe");
			mdID     = $(id).attr("mdID");
			
			if(md == "mdPROsearch")
			{
				$(".mdInPName").val(mdVALUe);
				$(".mdInPROID").val(mdID);
			}
			
		$(".mdPROJecTsrch").addClass("astDnone");	
		$(".mdPROJecTsrch").html("");
		
	}
	
	//////
	////////////////
	function mdLOADearchULI()
	{
		let mdLOads = "";
		    
			mdLOads =   '<li class="astFLex">'+
			                '<a href="javascript:void(0)" class="astFLex">'+
							    '<span>searching...</span>'+
							'</a>'+
			            '</li>';
			
		return mdLOads;	
	}
	
	function mdsucessBOXs(md,mdclass)
	{
		$(".mdsucessBOXs").addClass(mdclass);
		$(".mdsucessBOXs").css({'top':'0px'});
		$(".mdsucessBOXs").html(md);
		
		setTimeout(function()
		{
			$(".mdsucessBOXs").html("");
			$(".mdsucessBOXs").css({'top':'-60px'});
			$(".mdsucessBOXs").removeClass(mdclass);
		},3000);
	}
	
	function mdfillBOXs($mdItem,md,mdclass)
	{
		$(".mdsucessBOXs").addClass(mdclass);
		$(".mdsucessBOXs").css({'top':'0px'});
		$(".mdsucessBOXs").html(md);
		
		$mdItem.addClass("mdBORDeRclass");
		setTimeout(function()
		{
			$(".mdsucessBOXs").html("");
			$(".mdsucessBOXs").css({'top':'-60px'});
			$(".mdsucessBOXs").removeClass(mdclass);
			$mdItem.removeClass("mdBORDeRclass");
		},3000);
	}
	
</script>