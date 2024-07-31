    <div class="modal astModal_backdrop" id="updateModal">
	   <div class="modal-content astModal_contents astFLex">
        <div class="modal-header">
	        
            <a class="btn" fm="close" onclick="astMAPPOINTers(this)">
			    <span class="fa fa-close"></span>
			</a>
			<a class="btn start" fm="start" onclick="astMAPPOINTers(this)">
			    <span class="fa fa-unlock"></span>
			</a>
			<a class="btn end" fm="end" onclick="astMAPPOINTers(this)">
			    <span class="fa fa-lock"></span>
			</a>
        </div>
        <div class="modal-body" >
            <form class="well">

                <div class="d-none"> 
		            <label>Country</label>
                    <input type="text" class="form-control" value=""  id="astPT_InCountry">
		        </div>
				<div class="d-none"> 
		            <label>City</label>
                    <input type="text" class="form-control" value=""  id="astPT_InCity">
					<input type="hidden" class="form-control" value=""  id="astPT_InArea">
					
		        </div>
				<div class="astFLex"> 
		            <label>LATTITUDE</label>
                    <input type="text" class="form-control" value="" id="astPT_InLAT">
		        </div>
				<div class="astFLex"> 
		            <label>LONGITUDE</label>
                    <input type="text" class="form-control" value="" id="astPT_InLNG">
		        </div>
				<div class="d-none"> 
		            <label>PASSWORD</label>
                    <input type="number" class="form-control" value="" id="astPT_PASS">
					<input type="hidden" class="form-control" value=""  id="astPT_InID">
					<input type="hidden" class="form-control" value=""  id="astPT_InLATO">
					<input type="hidden" class="form-control" value=""  id="astPT_InLNGO">
					<input type="hidden" class="form-control" value=""  id="astPT_InPtName">
		        </div>
				<div> 
		            <button type="button" class="btn btn-primary" fm="edt" onclick="asHMAOPRtions(event,this)">Submit</button>
		        </div>
            </form>
        </div>
    
	   </div> 
	</div>
	
	<div class="modal hide fade astModal_backdrop" id="delModal">
        <div class="modal-header">
	    <h3>Delete This Index</h3>
        <a class="close" data-dismiss="modal"><span class="fa fa-close"></span></a>
        
        </div>
        <div class="modal-body">
	        <form class="well">

                <div> 
		            <label>Password</label>
                    <input type="text" class="form-control" value="" placeholder="Password" id="astDT_PASS">
		        </div> 
				<div>
		            <button class="btn btn-danger" fm="dlt" onclick="asHMAOPRtions(event,this)">DELETE</button>
		        </div>
			</form>	
        </div>
    </div>
	
	<div class="modal hide fade" id="updateSuccessModal">
      <div class="modal-header">
	    <h3>Updated Successfully</h3>
        <a class="close" data-dismiss="modal"><span class="fa fa-close"></span></a>
        
      </div>
      <div class="modal-body">
        <p>Thank you</p>
      </div>
    </div>
	
	<textarea type="hidden" class="mdRstOPtions intsrSROsaleVLUes astDnone">Sale|</textarea>
	<textarea type="hidden" class="mdRstOPtions intsrSResDNeVLUes astDnone">Apartment</textarea>
	<textarea type="hidden" class="mdRstOPtions intsrSBedsVLUes astDnone"></textarea>
	<textarea type="hidden" class="mdRstOPtions intsrSBthsVLUes astDnone"></textarea>
	<textarea type="hidden" class="mdRstOPtions intsrSPricesVLUes astDnone"></textarea>
	<textarea type="hidden" class="mdRstOPtions intsrSPricPMTsVLUes astDnone"><?php echo $mdMPRICes;?></textarea>
	<textarea type="hidden" class="mdRstOPtions intsrSAreasVLUes astDnone"></textarea>
	<input type="hidden" value="mdMain" placeholder="" class="mdUNLOCkVALUes">
	<input type="hidden" value="mdsearchLstnone" placeholder="" class="mdsearchLstPAsnone">
	<input type="hidden" value="mdsearchLstnone" placeholder="" class="mdsearchLstOPsnone">
	
	<div class="mdsucessBOXs astFLex"></div>
	
	<div class="mdFXDheader">
	    <div class="astFLex mdMAPSelmoreshdrs">
		    <div class="astFLex mdMAPSelmoreshdrcn mdMAPLODOs">
				<a href="<?php echo $smURLPATH;?>" class="astFLex">
					<img src="<?php echo $stWEBLOGO;?>" class="mdMAPLODOsPHOTOs">
				</a>
			</div>
			
			<div class="mdMAPcontainer astFLex mdFXDhidesss">
                <div class="mdFXDcontainer astFLex">
                    				
					<div class="astFLex mdMAPSelmoreshdrcn mdRstOPtions">
						<select class="form-control mdMAPsearchVALUe mdMAPscountries" onchange="mdMAPchsrchnGs(this)"
							fm="mdMAPsearch" fmKNd="srSCNTRY" fmID="mdMAPscountries" fmLst="mdMAPscountriesLst">
							<option value="<?php echo $defPATHsVALUe ?>"><?php echo $defPATHsVALUe ?></option>
							<?php echo $mdsrchLstCNTRYs;?>
						</select>
					</div>
						
					<div class="astFLex mdMAPSelmoreshdrcn mdRstOPtions">
						<select class="form-control mdMAPsearchVALUe mdMAPscities" onchange="mdMAPchsrchnGs(this)"
							fm="mdMAPsearch" fmKNd="srSCITY" fmID="mdMAPscities" fmLst="mdMAPscitiesLst">
							<option value="<?php echo $dfCitYs ?>"><?php echo $dfCitYs ?></option>
						</select>			
					</div>
					
					<div class="astFLex mdMAPSelmoreshdrcn mdRstOPtions astDnone">
						<input type="text" class="form-control mdMAPsearchVALUe mdMAPsdistrict" 
							placeholder="District" value="<?php //echo $fCdists ?>"
							onkeyup="mdMAPksearchinGs(event,this)" onchange="mdMAPchsearchinGs(this)"
							fm="mdMAPsearch" fmKNd="srDSTRCT" fmID="mdMAPsdistrict" fmLst="mdMAPsdistrictLst">
								
						<ul class="astFLex mdclear mdMAPsearchLst mdMAPsdistrictLst astDnone"></ul>	
					</div>
						
					<div class="astFLex mdMAPSelmoreshdrcn mdRstOPtions astDnone">
						<input type="text" class="form-control mdMAPsearchVALUe mdMAPsareas" 
							placeholder="Area" value="<?php //echo $dfDistrict ?>"
							onkeyup="mdMAPksearchinGs(event,this)" onchange="mdMAPchsearchinGs(this)"
							fm="mdMAPsearch" fmKNd="srAREAs" fmID="mdMAPsareas" fmLst="mdMAPsareasLst">
								
						<ul class="astFLex mdclear mdMAPsearchLst mdMAPsareasLst astDnone"></ul>	
					</div>
					
					<div class="astFLex mdMAPSelmoreshdrcn mdRstOPtions astDnone">
						<input type="text" class="form-control mdMAPsearchVALUe mdMAPsaddress" 
							placeholder="Address" value=""
							onkeyup="mdMAPksearchinGs(event,this)" onchange="mdMAPchsearchinGs(this)"
							fm="mdMAPsearch" fmKNd="srADDRes" fmID="mdMAPsaddress" fmLst="mdMAPsaddressLst">
								
						<ul class="astFLex mdclear mdMAPsearchLst mdMAPsaddressLst astDnone"></ul>	
					</div>
						
					<div class="astFLex mdMAPSelmoreshdrcn mdRstOPtions astDnone">
						<input type="text" class="form-control mdMAPsearchVALUe mdMAPsbuilds" 
							placeholder="Building" value="<?php //echo $dfAddresss ?>"
							onkeyup="mdMAPksearchinGs(event,this)" onchange="mdMAPchsearchinGs(this)"
							fm="mdMAPsearch" fmKNd="srADDRes" fmID="mdMAPsbuilds" fmLst="mdMAPsbuildsLst">
								
						<ul class="astFLex mdclear mdMAPsearchLst mdMAPsbuildsLst astDnone"></ul>	
					</div>
						
					<div class="astFLex mdMAPSelmoreshdrcn mdRstOPtions astDnone">
						<input type="text" class="form-control mdMAPsearchVALUe mdMAPsPname" 
							placeholder="P.name" value="<?php //echo $dfTower;?>"
							onkeyup="mdMAPksearchinGs(event,this)" onchange="mdMAPchsearchinGs(this)"
							fm="mdMAPsearch" fmKNd="srPROname" fmID="mdMAPsPname" fmLst="mdMAPsPnameLst">
								
						<ul class="astFLex mdclear mdMAPsearchLst mdMAPsPnameLst astDnone"></ul>	
					</div>
						
					<div class="astFLex mdMAPsearchcnt">
						<div class="astFLex mdMAPSelmoreshdrcn mdMAPDrOPcontainer mdRstOPtions">
							<label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsSize">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPsSize" 
							        placeholder="meter" value="<?php echo $defSIZEs;?>"
								    onclick="mdMAPSedowns(this)"
								    fm="mdMAPDrOPs" fmKNd="srASIZe" fb="meter" fmID="mdMAPsSize" 
									id="mdMAPsSize" fmLst="mdMAPsSizeLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>
							<input type="hidden" value="<?php echo $defSIZE;?>" class="mdMAPsSizeVLUe">
							<ul class="astFLex mdMAPsearchLst mdMAPsSizeLst astDnone">
							<?php 
							echo $mdMAPsSizes;
							?>
						    </ul>	
						</div>
							
						<div class="astFLex mdMAPSelmoreshdrcn mdMAPDrOPcontainer mdRstOPtions">
							<label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPscurrencY">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPscurrencY" 
							        placeholder="USD" value="<?php echo $defCURNCY;?>"
								    onclick="mdMAPSedowns(this)"
								    fm="mdMAPDrOPs" fmKNd="srSCRNCY" fb="USD" fmID="mdMAPscurrencY" 
									id="mdMAPscurrencY" fmLst="mdMAPscurrencYLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>	
							<input type="hidden" value="<?php echo $defCURNCYs;?>" class="mdMAPscurrencYVLUe">
							<ul class="astFLex mdMAPsearchLst mdMAPscurrencYLst astDnone">
							<?php 
							echo $mdMAPscurrncYes;
							?>
							</ul>	
						</div>
						
						<div class="astFLex mdMAPSelmoreshdrcn mdMAPSedown">
						    <label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsPurPose">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPsPurPose" 
							           placeholder="Purpose" value="Sale"
								       onclick="mdMAPSedowns(this)"
								       fm="mdMAPsearch" fb="Sale" fmID="mdMAPsPurPose" 
									   id="mdMAPsPurPose" fmLst="mdMAPsPurPoseLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>		   
							<div class="astFLex mdMAPSedowncn mdMAPSedownbd mdMAPsPurPoseLst">
							    <div class="astFLex mdMAPSedowncn mdMAPSedownbods">
								    <label class="astFLex mdMAPSlabels">Propose</label>
									<label class="astFLex mdMAPSlabels">Market</label>
								    <div class="astFLex mdMAPSedowncnt mdMAPsPurPosecn mdMAPsPurPoseMLst">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astNWVLUe astFLex" 
										    fm="mdMAPsPurPose" fb="market" fbset="intsrSROsaleVLUes" fValue="Sale" onclick="mdMAPSechoose(this)">
								            <span>Sale</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsPurPose" fb="market" fbset="intsrSROsaleVLUes" fValue="Rent" onclick="mdMAPSechoose(this)">
								            <span>Rent</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsPurPose" fb="market" fbset="intsrSROsaleVLUes" fValue="ROI" onclick="mdMAPSechoose(this)">
								            <span>ROI</span>
								        </a>
								    </div>
									<label class="astFLex mdMAPSlabels">DED</label>
								    <div class="astFLex mdMAPSedowncnt mdMAPsPurPosecn mdMAPsPurPoseDLst">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsPurPose" fb="ded" fbset="intsrSROsaleVLUes" fValue="Sale" onclick="mdMAPSechoose(this)">
								            <span>Sale</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsPurPose" fb="ded" fbset="intsrSROsaleVLUes" fValue="Rent" onclick="mdMAPSechoose(this)">
								            <span>Rent</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsPurPose" fb="ded" fbset="intsrSROsaleVLUes" fValue="ROI" onclick="mdMAPSechoose(this)">
								            <span>ROI</span>
								        </a>
								    </div>
								</div>
								<div class="astFLex mdMAPSedowncn mdMAPSedownfooter">
							        <a href="javascript:void(0)" class="btn btn-danger"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Sale" fmID="mdMAPsPurPose" 
									    fbs="reset" fbset="intsrSROsaleVLUes" fmLst="mdMAPsPurPoseLst">
									
								        <span>reset</span>
								    </a>
									<a href="javascript:void(0)" class="btn btn-success"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Sale" fmID="mdMAPsPurPose" 
									    fbs="done" fbset="intsrSROsaleVLUes" fmLst="mdMAPsPurPoseLst">
									
								        <span>done</span>
								    </a>
							    </div>
							
							</div>	
								
						</div>
						
						<div class="astFLex mdMAPSelmoreshdrcn mdMAPssearchBOxParent mdRstOPtions">
						    <input type="search" class="form-control mdMAPsearchVALUe mdMAPssearchBOx" 
							    placeholder="Full Search..." value="<?php echo $defSEARCh;?>"
								onkeyup="mdMAPksearchinGs(event,this)" onchange="mdMAPchsearchinGs(this)"
								fm="mdMAPsearch" fmKNd="srSBOX" fmID="mdMAPssearchBOx" fmLst="mdMAPssearchBOxLst">
								
							<ul class="astFLex mdclear mdMAPsearchLst mdMAPssearchBOxLst astDnone"></ul>	
						</div>					
							
						<div class="astFLex mdMAPSelmoreshdrcn mdMAPssearchBTNs mdMAPssearchBTNss mdMAPschNONe astDnone">
							<a href="javascript:void(0)" class="astFLex btn mdMAPsearchVALUe mdFXDhidesssss" 
					            fm="searchMOBs" fb="mdRzoom" onclick="mdMAPsseArchBOxs(this)">
					            <i class="fa fa-search"></i>
				            </a>
						    <a href="javascript:void(0)" class="astFLex btn mdMAPsearchVALUe" 
							    fm="searchTB" fb="mdRzoom" onclick="mdMAPsseArchBOxs(this)">
							    <i class="fa fa-search"></i>
						    </a>
							<a href="javascript:void(0)" class="astFLex astDnone btn start mdMAPsearchVALUe" 
							    onclick="mdMAPSedowns(this)"
							    fm="mdMAPsmore" fb="mdMAPsmore" fmID="mdMAPSedowncontainer" 
							    fmLst="mdMAPSedowncontainerLst">
							    <i class="fa fa-plus"></i>
						    </a>
					    </div>	
						
					</div>
				</div>
				
				<div class="astFLex mdMAPSelmoreshdrcn mdFXDsch astDMnone">
					
					<div class="astFLex mdMAPSelmoreshdrcn mdMAPssearchBTNs">
						<a href="javascript:void(0)" class="astFLex btn start mdMAPsearchVALUe mdMAPschBOxsLNk" 
							onclick="mdMAPSedowns(this)"
							fm="mdMAPsmore" fb="mdMAPsmore" fmID="mdMAPSedowncontainer" 
							fmLst="mdMAPSedowncontainerLst">
							<i class="fa fa-plus"></i>
						</a>
						<div class="astFLex mdFXDoPtions mdMAPssearchBTNs">
						    <a href="javascript:void(0)" class="start astFLex btn mdMAPsearchVALUe mdMAPschBOxsLNk" 
							    fm="searchTB" onclick="mdMAPssearchOPTIONs(this)">
							    <i class="fa fa-table"></i>
						    </a>
							<a href="javascript:void(0)" class="start astFLex btn mdMAPsearchVALUe mdMAPschBOxsLNk" 
							    fm="searchMP" onclick="mdMAPssearchOPTIONs(this)">
							    <i class="fa fa-map-marker"></i>
						    </a>
					    </div>
						<a href="javascript:void(0)" class="astFLex btn mdMAPsearchVALUe mdMAPsseArchBOxsLNk" 
							fm="searchTB" fb="mdRzoom" onclick="mdMAPsseArchBOxs(this)">
							<i class="fa fa-search"></i>
						</a>
						
					</div>
				</div>
						
				<div class="astFLex mdMAPSedowncontainer mdMAPSedowncontainerLst astDnone">
						  
						  <div class="astFLex mdMAPSelmoreshdrcn mdMAPSedown">
						    <label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsReTYPes">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPsReTYPes" 
							           placeholder="Residential" value=""
								       onclick="mdMAPSedowns(this)"
								       fm="mdMAPsearch" fb="Residential" fmID="mdMAPsReTYPes" 
									   id="mdMAPsReTYPes" fmLst="mdMAPsReTYPesLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>		   
							<div class="astFLex mdMAPSedowncn mdMAPSedownbd mdMAPsReTYPesLst">
							    <div class="astFLex mdMAPSedowncn mdMAPSedownbods">
								    <div class="mdMAPSedowncnt mdMAPSedowncntabs astFLex">
								        <a href="javascript:void(0)" class="astDTABactive mdMAPsearchLnk astFLex" 
									        onclick="mdMAPSedowns(this)" 
											fm="mdMAPtabs" fb="mdMAPsReTYPeRe" fbl="fbMSearch">
								            <span>Residential</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        onclick="mdMAPSedowns(this)" 
											fm="mdMAPtabs" fb="mdMAPsReTYPecm" fbl="fbMSearch">
								            <span>Commercial</span>
								        </a>
								    </div>
								    
									<div class="mdMAPSedowncnt mdMAPSedowntabs mdMAPsReTYPeRe astFLex">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk mdMAPsearchAPRTLnk astNWVLUe astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Apartment" onclick="mdMAPSechoose(this)">
								            <span>Apartment</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Townhouse" onclick="mdMAPSechoose(this)">
								            <span>Townhouse</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Villa Compound" onclick="mdMAPSechoose(this)">
								            <span>Villa Compound</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Residential Plot" onclick="mdMAPSechoose(this)">
								            <span>Residential Plot</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Residential Building" onclick="mdMAPSechoose(this)">
								            <span>Residential Building</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Villa" onclick="mdMAPSechoose(this)">
								            <span>Villa</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Penthouse" onclick="mdMAPSechoose(this)">
								            <span>Penthouse</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Hotel Apartment" onclick="mdMAPSechoose(this)">
								            <span>Hotel Apartment</span>
								        </a>
								    </div>
								
								    <div class="mdMAPSedowncnt mdMAPSedowntabs mdMAPsReTYPecm astFLex astDnone">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Office" onclick="mdMAPSechoose(this)">
								            <span>Office</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Warehouse" onclick="mdMAPSechoose(this)">
								            <span>Warehouse</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Commercial Villa" onclick="mdMAPSechoose(this)">
								            <span>Commercial Villa</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Commercial Plot" onclick="mdMAPSechoose(this)">
								            <span>Commercial Plot</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Commercial Building" onclick="mdMAPSechoose(this)">
								            <span>Commercial Building</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Industrial Land" onclick="mdMAPSechoose(this)">
								            <span>Industrial Land</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Staff Accommodation" onclick="mdMAPSechoose(this)">
								            <span>Staff Accommodation</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Shop" onclick="mdMAPSechoose(this)">
								            <span>Shop</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Mixed Used Land" onclick="mdMAPSechoose(this)">
								            <span>Mixed Used Land</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Retail" onclick="mdMAPSechoose(this)">
								            <span>Retail</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
									        fm="mdMAPsReTYPes" fbset="intsrSResDNeVLUes" fValue="Other Commercial" onclick="mdMAPSechoose(this)">
								            <span>Other Commercial</span>
								        </a>
								    </div>
								</div>
								
								<div class="astFLex mdMAPSedowncn mdMAPSedownfooter">
							        <a href="javascript:void(0)" class="btn btn-danger"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Residential" fmID="mdMAPsReTYPes" 
									    fbs="reset" fbset="intsrSResDNeVLUes" fmLst="mdMAPsReTYPesLst">
									
								        <span>reset</span>
								    </a>
									<a href="javascript:void(0)" class="btn btn-success"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Residential" fmID="mdMAPsReTYPes" 
									    fbs="done" fbset="intsrSResDNeVLUes" fmLst="mdMAPsReTYPesLst">
									
								        <span>done</span>
								    </a>
							    </div>
							
							</div>	
								
						  </div>
						  
						  <div class="astFLex mdMAPSelmoreshdrcn mdMAPSedown">
						    <label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsBeDsTHs">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPsBeDsTHs" 
							           placeholder="Beds/Baths" value=""
								       onclick="mdMAPSedowns(this)"
								       fm="mdMAPsearch" fb="Beds/Baths" fmID="mdMAPsBeDsTHs" 
									   id="mdMAPsBeDsTHs" fmLst="mdMAPsBeDsTHsLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>		   
							<div class="astFLex mdMAPSedowncn mdMAPSedownbd mdMAPsBeDsTHsLst">
							    <div class="astFLex mdMAPSedowncn mdMAPSedownbods">
								    <label class="astFLex mdMAPSlabels">Beds</label>
								    <div class="astFLex mdMAPSedowncnt mdMAPsBeDscn mdMAPsBeDsLst">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="Studio" onclick="mdMAPSechoose(this)">
								            <span>Studio</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="1" onclick="mdMAPSechoose(this)">
								            <span>1</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="2" onclick="mdMAPSechoose(this)">
								            <span>2</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="3" onclick="mdMAPSechoose(this)">
								            <span>3</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="4" onclick="mdMAPSechoose(this)">
								            <span>4</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="5" onclick="mdMAPSechoose(this)">
								            <span>5</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="6" onclick="mdMAPSechoose(this)">
								            <span>6</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsBeDs" fbset="intsrSBedsVLUes" fValue="7" onclick="mdMAPSechoose(this)">
								            <span>7+</span>
								        </a>
										
								    </div>
								    
									<label class="astFLex mdMAPSlabels">Baths</label>
								    <div class="astFLex mdMAPSedowncnt mdMAPssTHscn mdMAPsTHsLst">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="1" onclick="mdMAPSechoose(this)">
								            <span>1</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="2" onclick="mdMAPSechoose(this)">
								            <span>2</span>
								        </a>
									    <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="3" onclick="mdMAPSechoose(this)">
								            <span>3</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="4" onclick="mdMAPSechoose(this)">
								            <span>4</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="5" onclick="mdMAPSechoose(this)">
								            <span>5</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="6" onclick="mdMAPSechoose(this)">
								            <span>6</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="7" onclick="mdMAPSechoose(this)">
								            <span>7</span>
								        </a>
										<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
										    fm="mdMAPsTHs" fbset="intsrSBthsVLUes" fValue="8" onclick="mdMAPSechoose(this)">
								            <span>8+</span>
								        </a>
								    </div>
								
								</div>
								<div class="astFLex mdMAPSedowncn mdMAPSedownfooter">
							        <a href="javascript:void(0)" class="btn btn-danger"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Beds/Baths" fmID="mdMAPsBeDsTHs" 
									    fbs="reset" fbset="intsrSBthsVLUes|intsrSBedsVLUes" fmLst="mdMAPsBeDsTHsLst">
									
								        <span>reset</span>
								    </a>
									<a href="javascript:void(0)" class="btn btn-success"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Beds/Baths" fmID="mdMAPsBeDsTHs" 
									    fbs="done" fbset="intsrSBthsVLUes|intsrSBedsVLUes" fmLst="mdMAPsBeDsTHsLst">
									
								        <span>done</span>
								    </a>
							    </div>
							
							</div>	
								
						  </div>
						  
						  <div class="astFLex mdMAPSelmoreshdrcn mdMAPSedown">
						    <label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsPrice">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPsPrice" 
							           placeholder="Price" value=""
								       onclick="mdMAPSedowns(this)"
								       fm="mdMAPsearch" fb="Price" fmID="mdMAPsPrice" 
									   id="mdMAPsPrice" fmLst="mdMAPsPriceLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>		   
							<div class="astFLex mdMAPSedowncn mdMAPSedownbd mdMAPsPriceLst">
							    <div class="astFLex mdMAPSedowncn mdMAPSedownbods">
								    <div class="mdMAPSedowncnt mdMAPSedowncntabs astFLex">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex">
								            <span>Minimum</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex">
								            <span>Maximum</span>
								        </a>
								    </div>
								    <div class="astFLex mdMAPSedowncnt mdMAPsPricecn">
								        <input type="number" placeholder="0" class="mdMAPsearchLnk astFLex">
									    <input type="number" placeholder="any" class="mdMAPsearchLnk astFLex">
								    </div>
								</div>
								<div class="astFLex mdMAPSedowncn mdMAPSedownfooter">
							        <a href="javascript:void(0)" class="btn btn-danger"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Price" fmID="mdMAPsPrice" 
									    fbs="reset" fbset="intsrSPricesVLUes" fmLst="mdMAPsPriceLst">
									
								        <span>reset</span>
								    </a>
									<a href="javascript:void(0)" class="btn btn-success"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Price" fmID="mdMAPsPrice" 
									    fbs="done" fbset="intsrSPricesVLUes" fmLst="mdMAPsPriceLst">
									
								        <span>done</span>
								    </a>
							    </div>
							</div>	
						  </div>
						  
						  <div class="astFLex mdMAPSelmoreshdrcn mdMAPSedown">
						    <label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsPricePMFT">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPsPricePMFT" 
							           placeholder="<?php echo $mdMPRICLABel;?>" value="<?php echo $mdMPRICes;?>"
								       onclick="mdMAPSedowns(this)"
								       fm="mdMAPsearch" fb="Price" fmID="mdMAPsPricePMFT" 
									   id="mdMAPsPricePMFT" fmLst="mdMAPsPricePMFTLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>		   
							<div class="astFLex mdMAPSedowncn mdMAPSedownbd mdMAPsPricePMFTLst">
							    <div class="astFLex mdMAPSedowncn mdMAPSedownbods">
								    <div class="mdMAPSedowncnt mdMAPSedowncntabs astFLex">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex">
								            <span>Minimum</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex">
								            <span>Maximum</span>
								        </a>
								    </div>
								    <div class="astFLex mdMAPSedowncnt mdMAPsPricePMFTcn">
								        <input type="number" placeholder="0" value="<?php echo $defMPRICE;?>" class="mdMAPsearchLnk astFLex">
									    <input type="number" placeholder="any" value="<?php echo $defXPRICE;?>" class="mdMAPsearchLnk astFLex">
								    </div>
								</div>
								<div class="astFLex mdMAPSedowncn mdMAPSedownfooter">
							        <a href="javascript:void(0)" class="btn btn-danger"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Price" fmID="mdMAPsPricePMFT" 
									    fbs="reset" fbset="intsrSPricPMTsVLUes" fmLst="mdMAPsPricePMFTLst">
									
								        <span>reset</span>
								    </a>
									<a href="javascript:void(0)" class="btn btn-success"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Price" fmID="mdMAPsPricePMFT" 
									    fbs="done" fbset="intsrSPricPMTsVLUes" fmLst="mdMAPsPricePMFTLst">
									
								        <span>done</span>
								    </a>
							    </div>
							</div>	
						  </div>
						  
						  <div class="astFLex mdMAPSelmoreshdrcn mdMAPSedown">
						    <label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsArea">
							    <input type="text" class="form-control mdMAPsearchVALUe mdMAPsArea" 
							           placeholder="Area" value=""
								       onclick="mdMAPSedowns(this)"
								       fm="mdMAPsearch" fb="Area" fmID="mdMAPsArea" 
									   id="mdMAPsArea" fmLst="mdMAPsAreaLst" readOnly>
								<span class="fa fa-chevron-down"></span>	   
							</label>		   
							<div class="astFLex mdMAPSedowncn mdMAPSedownbd mdMAPsAreaLst">
							    <div class="astFLex mdMAPSedowncn mdMAPSedownbods">
								    <div class="mdMAPSedowncnt mdMAPSedowncntabs astFLex">
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex">
								            <span>Minimum</span>
								        </a>
								        <a href="javascript:void(0)" class="mdMAPsearchLnk astFLex">
								            <span>Maximum</span>
								        </a>
								    </div>
								    <div class="astFLex mdMAPSedowncnt mdMAPsAreacn">
								        <input type="number" placeholder="0" class="mdMAPsearchLnk astFLex">
									    <input type="number" placeholder="any" class="mdMAPsearchLnk astFLex">
								    </div>
								</div>
								<div class="astFLex mdMAPSedowncn mdMAPSedownfooter">
							        <a href="javascript:void(0)" class="btn btn-danger"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Area" fmID="mdMAPsArea" 
									    fbs="reset" fbset="intsrSAreasVLUes" fmLst="mdMAPsAreaLst">
									
								        <span>reset</span>
								    </a>
									<a href="javascript:void(0)" class="btn btn-success"
								        onclick="mdMAPSedowns(this)"
								        fm="mdMAPdone" fb="Area" fmID="mdMAPsArea" 
									    fbs="done" fbset="intsrSAreasVLUes" fmLst="mdMAPsAreaLst">
									
								        <span>done</span>
								    </a>
							    </div>
							</div>	
						  </div>
						  
				    
					
				</div>
					    
			</div>
			
			<input type="hidden" value="searchMP" class="mdsearchTYPclicked">
			
			<div class="astFLex mdMAPSelmoreshdrcn mdMAPssearchBTNs searchMOBs astDnone">
			    <div class="astFLex mdMAPSelmoreshdrcn mdFXDoPtions">
				    <div class="astFLex mdMAPSelmoreshdrcn mdMAPssearchBTNs">
						<a href="javascript:void(0)" class="start astFLex btn mdMAPsearchVALUe mdMAPschBOxsLNk" 
							fm="searchTB" onclick="mdMAPssearchOPTIONs(this)">
							<i class="fa fa-table"></i>
						</a>
						<a href="javascript:void(0)" class="start astFLex btn mdMAPsearchVALUe mdMAPschBOxsLNk" 
							fm="searchMP" onclick="mdMAPssearchOPTIONs(this)">
							<i class="fa fa-map-marker"></i>
						</a>
				    </div>
			    </div>
				<div class="astFLex mdMAPSelmoreshdrcn">
				    <a href="javascript:void(0)" class="astFLex btn mdMAPsearchVALUe mdFXDhidesssss" 
					    fm="searchMOBs" fb="mdRzoom" onclick="mdMAPsseArchBOxs(this)">
					    <i class="fa fa-search"></i>
				    </a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal mdMAPSelmores">
	   <div class="modal-content mdMAPSelmorescn astFLex">
            <div class="modal-body mdMAPSelmoresbd">
			    <div class="modal-header astFLex mdMAPSelmoreshdr">

					<div class="astFLex mdMAPSelmoreshdrPrint"> 
					    <div class="astFLex mdMAPsearchCNTLnks">
		                    <a class="mdMAPschLnks mdMAPActive btn astDnone" data-column="0">
							    <span>OPtions</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn astDnone" data-column="1">
							    <span>ID</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn astDnone" data-column="2">
							    <span>Country</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn astDnone" data-column="3">
							    <span>City</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn astDnone" data-column="4">
							    <span>District</span>
							</a> 
							<a class="mdMAPschLnks btn astDMnone" data-column="5">
							    <span>Area</span>
							</a>
							<a class="mdMAPschLnks btn astDMnone" data-column="6">
							    <span>Address</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn astDnone" data-column="7">
							    <span>Building</span>
							</a> 
							<a class="mdMAPschLnks btn astDMnone" data-column="8">
							    <span>P.N</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn" data-column="9">
							    <span>PurPose</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn" data-column="10">
							    <span>Type</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn" data-column="11">
							    <span>Price</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn astDMnone" data-column="12">
							    <span>P.mt^</span>
							</a> 
							<a class="mdMAPschLnks btn astDMnone" data-column="13">
							    <span>P.ft^</span>
							</a> 
							<a class="mdMAPschLnks mdMAPActive btn" data-column="14">
							    <span>Size</span>
							</a> 
							<a class="mdMAPschLnks btn astDMnone" data-column="15">
							    <span>S.ft</span>
							</a> 
		                    <a class="mdMAPschLnks btn" data-column="16">
							    <span>Beds</span>
							</a>
							<a class="mdMAPschLnks btn" data-column="17">
							    <span>Baths</span>
							</a>
							<a class="mdMAPschLnks mdMAPActive btn astDnone" data-column="18">
							    <span>Link</span>
							</a>
		                </div>
						<div class="mdMAPsearchCNTPRNts">
						</div>
					</div>
					
					<div class="astFLex mdUNLOCkKeYs">
                   
				    <div class="astFLex mdUNLOCkKYss">
				        <a href="javascript:void(0)" class="astFLex btn mdNormalKeYs mdNormalKeYPlus" 
					        fm="mdMain" onclick="mdUNLOCkKeYs(this)">
						    <i class="fa fa-table"></i>
					    </a>
						<a href="javascript:void(0)" class="astFLex btn mdNormalKeYs mdNormalKeYPlus mdOPeNGentv" 
						    dfKNd="mdGTv" mdKNd="InPro" fm="add" mdID="0" onclick="mdOPeNtv(this)">
						    <i class="fa fa-tv"></i>
						</a>
						<a href="javascript:void(0)" class="astFLex btn mdNormalKeYs mdNormalKeYPlus" 
					        fm="mdMain" onclick="mdUNLOCkKeYs(this)">
						    <i class="fa fa-users"></i>
					    </a>
						<a href="javascript:void(0)" class="astFLex btn mdNormalKeYs mdNormalKeYPlus" 
					        fm="mdMain" onclick="mdUNLOCkKeYs(this)">
						    <i class="fa fa-project">P</i>
					    </a>
						<a href="javascript:void(0)" class="astFLex btn mdNormalKeYs mdNormalKeYPlus" 
						    dfKNd="mdhtml" mdKNd="InPro" fm="add" mdID="0" onclick="mdOPeNOPtions(this)">
						    <i class="fa fa-plus"></i>
						</a>
						
				        <a href="javascript:void(0)" class="astDnone btn mdNormalKeYs" 
					        fm="mdSimPle" onclick="mdUNLOCkKeYs(this)">
						    <span class="">Simple</span>
					    </a>
				        <a href="javascript:void(0)" class="astDnone btn mdNormalKeYs" 
					        fm="mdOPtions" onclick="mdUNLOCkKeYs(this)">
						    <span class="">OPtions</span>
					    </a>
					    <a href="javascript:void(0)" class="astDnone btn mdNormalKeYs" 
					        fm="mdLink" onclick="mdUNLOCkKeYs(this)">
						    <span class="">Sources</span>
					    </a>
						
					</div>
					<div class="astFLex mdUNLOCkKeYss">
					    <input type="text" placeholder="password" class="mdUNLOCkPass">
						<a href="javascript:void(0)" class="astFLex btn mdNormalKeYs" 
					        fm="mdDone" onclick="mdUNLOCkKeYs(this)">
						    <span class="">Done</span>
					    </a>
						<a href="javascript:void(0)" class="astFLex btn mdNormalKeYs" 
					        fm="mdClose" onclick="mdUNLOCkKeYs(this)">
						    <span class="">close</span>
					    </a>
					</div>
				
				    </div>
					
				</div>
				<div class="mdTBLePARent">
				    
				    
					
				</div> 
				
		    </div>
	   </div> 
	</div>
	
	<input type="hidden" class="mdVALUeDtID">
	<input type="hidden" class="mdVALUeDtAction">
	<input type="hidden" class="mdVALUeDtKNd">
	
	<div class="modal mdTBLeOPTionPARent">
	    <div class="modal-content astFLex">
            <div class="modal-body">
			    <div class="modal-header astFLex">
				    <div class="astFLex mdOPtionheader">
					    <div class="astFLex">
						    <a href="javascript:void(0)" fm="new" onclick="mdOPTionAction(this)" class="astFLex btn mdOPtionLNks mdOPtionNeWLNks">
						        <i class="fa fa-plus"></i>
								<span>New</span>
						    </a>
						    <a href="javascript:void(0)" fm="save" onclick="mdOPTionAction(this)" class="astFLex btn mdOPtionLNks">
						        <i class="fa fa-check"></i>
								<span>save</span>
						    </a>
						    
						</div>
						<h4 class="astFLex mdOPtionTiTLe">
						    UPDATE Index Property
						</h4>
						<a href="javascript:void(0)" fm="close" onclick="mdOPTionAction(this)" class="astFLex btn mdOPtionLNks fa_close">
						    <i class="fa fa-close"></i>
						</a>
					</div>
					
				</div>
				
				<div class="mdTBLePOPUPmodal"> 
				    <div class="astFLex mdTBLePOPUPcnt">
					    
						
					</div>
				</div>
				
				<div class="mdTBLeOPTionPBODY"> </div> 
			</div>
        </div>			
	</div> 
	
	<div class="modal mdUsROPTionPARent">
	    <div class="modal-content astFLex">
            <div class="modal-body">
			    <div class="modal-header astFLex">
				    <div class="astFLex mdOPtionheader">
					    <div class="astFLex">
						    
						</div>
						<a href="javascript:void(0)" fm="mdsinclose" onclick="mdOPTionAction(this)" class="astFLex btn mdOPtionLNks fa_close">
						    <i class="fa fa-close"></i>
						</a>
					</div>
				</div>
				<div class="mdUsROPTionBODY">
				    <div class="astFLex mdUsROPTPioncnt">
				        <?php 
						echo mdUserTstRess("");
						?>
						
						<div class="astFLex mdUsROPTioncntner"></div>
					</div>	
				</div> 
			</div>
        </div>			
	</div> 
	
	<div id="loading-more" style="display:none">
        <div class="loading-indicator">
		    <h4 >
			    <div class="img-loading"><img src="<?php echo $smPATH;?>img/loader.gif"></div>
			    <span id="error-msg-more">Searching ...</span>
				
			</h4>
            
        </div>
    </div>
	      
	<div  style="display:none;background:red;position: absolute;width: 220px;height: 100px;top: 50%;left: 50%;margin: -10px 0 0 -110px;z-index: 20001;border-radius:5px;">    
			<div id="nResults"></div>
			<div id="nProgress"></div>
	</div>
	  
    
    <div class="modal hide thisPH_modal" id="thisPH_modalcroPs">
        <div class="modal-dialog modal-lg thisPH_modaldG">
            <div class="modal-content thisPH_modalcG">
			
                <div class="modal-header d-flex">
                    <h4 class="modal-title">Upload Images</h4>
                    <button type="button" class="close" data-dismiss="modal" 
					    modal="thisPH_modalcroPs" onclick="mdPROPclose(this)">
					    x
					</button>
                </div>
            
			    <form class="thisPH_modalfG d-flex" method="POST" enctype="multipart/form-data">
            
			        
						
                    <input type="hidden" id="post_img_data" name="image_data_url">
                    <div class="modal-body thisPH_modalbDG d-flex tmodalflXCPG">
                        
                        <div class="thisPH_modalbGG thisPH_modalbGYG d-flex" id="galleryImages"></div>
						
						<div class="thisPH_modalbGG thisPH_modalbCPG">
                            <div class="img-preview"></div>
							<div class="thisPH_modalbGG thisPH_modalbCRPG" id="cropper">
                                <canvas id="cropperImg" width="0" height="0"></canvas>
								<div class="thisCRPbtns d-flex">
                                    <button md="done" onclick="mdCroPAction(this)" type="button" class="cropImageBtn btn" style="display:none;" id="cropImageBtn">Crop</button>
									<button md="close" onclick="mdCroPAction(this)" type="button" class="cropImageBtn btn" style="display:none;" id="closeImageBtn">cancel</button>
								</div>	
                            </div>
							<div class="modal-footer d-flex">
                                <button type="submit" onclick="mdUPLoad(event,this)" class="btn">Upload</button>
								<button type="submit" onclick="mdUPdone(event)" class="mdUPcroPclose btn">cancel</button>
								
                            </div>
						</div>	
						
                        <div id="imageValidate" class="text-danger"></div>
                    </div>
                
				    <div class="thisPHmodalPROms alert-info" style="display:none"></div>
				</form>
			
            </div>
        </div>
    </div>	  
	
	  
	
	    <div class="share-side" id="share-side">
	        <div class="side-menu-hide" onclick="side_menu_hide()">
		        <span class="fa fa-close"></span>
			</div>
	       <div class="share-div" id="share-div">
		      <div class="shareResultsOptions" >
                  <center>
                    <div class="btn-bt" id="shareResultsOptions"> 
					    
                    </div>
				  </center>
				 <input id="sHeaders" type="hidden">
             </div>
		   </div>
	    </div>
	
	
	<div class="astMOReIMAPsLIST modal-backdrop" id="astMOReIMAPsLIST">
	    <div class="astMOReIMAPs astFLex">
		    <div class="modal-header astFLex">
		        <h3 class="astMOReIMAPsTItle astFLex">
		           Details Of Index
		        </h3>
				<a href="javascript:void(0)" fm="close" onclick="astMOReIMAPs(this)" class="btn astMAPINclose astFLex">
		            <i class="fa fa-close"></i>
		        </a>
		    </div>
			<div class="astMOReIMAPsLOAD astFLex" id="astMOReIMAPsLOAD">
		        <div class="astMOReLOADer astFLex">
				    <h3>LOADING...</h3>
				</div>
		    </div>
			<div class="modal-footer astFLex">
		       
		    </div>
		</div>
	</div>
	
	<div class="astMOReIMAPsLIST modal-backdrop" id="astMOReIMAPsTA">
	    <div class="astMOReIMAPs astFLex">
		    <div class="modal-header astFLex">
		        <h3 class="astMOReIMAPsTItle astFLex">
		           Statistics Of MAP
		        </h3>
				<a href="javascript:void(0)" fm="close" onclick="astMOReIMAPsTA(this)" class="btn astMAPINclose astFLex">
		            <i class="fa fa-close"></i>
		        </a>
		    </div>
			<div class="astMOReIMAPsLOAD astFLex" id="astMOReIMAPsTALOAD">
		        <div class="astMOReLOADer astFLex">
				    <h3>LOADING...</h3>
				</div>
		    </div>
			<div class="modal-footer astFLex">
		       
		    </div>
		</div>
	</div>
	
	<input type="hidden" id="tmOFFsetmodal" value="0">
	<input type="hidden" id="tmROWsmodal" value="10">
	
	<input type="hidden" id="tmOFFsetmodals" value="0">
	<input type="hidden" id="tmROWsmodals" value="10">
	
	<div class="modal mdPROPertiesmodal" id="mdPROPertiesmodal">
	    <div class="modal-content mdPROPcontent astFLex">
            
		</div>			
	</div> 
	
	<input type="hidden" id="mdsUPloadsID">
	<input type="hidden" id="mdsUPloadsmd">
	<input type="hidden" id="mdsUPloadsfm">
	<input type="hidden" id="mdsUPloadsmdact">
	<input type="hidden" id="mdsUPloadsVALUes">
	<input type="hidden" id="mdsUPloadsmdKnd">
	