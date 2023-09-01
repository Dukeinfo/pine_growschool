<div>
       <!-- BEGIN: Hero Banner Start -->
       @include('livewire.frontend.common.herobanner')

    <!-- END: Hero Banner End -->

    <!-- BEGIN: Section -->
    <section class="serviceSection02">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar lft">
                        @livewire('frontend.common.quick-links')
           
                    </div>
                </div>
              <div class="col-lg-8">
            <form action="" wire:submit.prevent="store">
                <div class="row">
                  <div class="col-md-12">
                      <div style="text-align:left;"><strong>A:</strong> <span><strong><u>GENERAL INFORMATION:</u></strong></span></div>
                      <table class="table table-bordered mb-4">
                          <thead class="table-primary">
                              <tr>
                                  <td>
                                      <strong>S.NO.</strong>
                                  </td>
                                  <td>
                                      <strong>INFORMATION</strong>
                                  </td>
                                  <td>
                                      <strong>DETAILS</strong>
                                  </td>
                              </tr>
                          </thead>
                          </tbody>
                          <tr>
                              <td>
                                  1
                              </td>
                              <td>
                                  NAME OF THE SCHOOL
                              </td>
                              <td>
                                  <input type="text" class="form-control"  wire:model="school_name" id="school_name" value="Comet Mensa Public School"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  2
                              </td>
                              <td>
                                  AFFILIATION NO.(IF APPLICABLE)
                              </td>
                              <td>
                                  <input type="text" class="form-control" id=""  wire:model="application_no" id="affn_no" value="630099"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  3
                              </td>
                              <td>
                                  SCHOOL CODE (IF APPLICABLE)
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="school_code" id="school_code" value="43094"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  4
                              </td>
                              <td>
                                  COMPLETE ADDRESS WITH PIN CODE
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="school_add" id="school_add" value="Comet Mensa Public School, Dehri, Tehsil Fatehpur, District Kangra, Himachal Pradesh - 176022"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  5
                              </td>
                              <td>
                                  PRINCIPAL NAME & QUALIFICATION:
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="principal_detail" id="principal_det" value="Mrs. Jyoti Mahajan, M.Sc. (Botany), M. Phil.,  B.Ed.,  T.E.T., C.T.E.T."/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  6
                              </td>
                              <td>
                                  SCHOOL EMAIL ID
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="school_email" id="school_email" value="cmpschool2003@yahoo.com"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  7
                              </td>
                              <td>
                                  CONTACT DETAILS (LANDLINE/MOBILE)
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="school_phone" id="school_phone" value="+91-9816025121, +91-9418292521"/>
                              </td>
                          </tr>
                          </tbody>
                      </table>
                      <div style="text-align:left;"><strong>B:</strong> <span><strong><u>DOCUMENTS AND INFORMATION:</u></strong></span></div>
                      <table class="table table-bordered mb-4">
                          <thead class="table-primary">
                              <tr>
                                  <td>
                                      <strong>S.NO.</strong>
                                  </td>
                                  <td>
                                      <strong>DOCUMENTS/INFORMATION</strong>
                                  </td>
                                  <td>
                                      <strong>UPLOAD DOCUMENTS </strong>
                                  </td>
                              </tr>
                          </thead>
                          </tbody>
                          <tr>
                              <td>
                                  1
                              </td>
                              <td>
                                  COPIES OF AFFILIATION/UPGRADATION LETTER AND RECENT EXTENSION OF AFFILIATION, IF ANY
                              </td>
                              <td>
                                  <input type="file" id="affn_doc" wire:model="doc1" />
                                                                  <a href="cbsedocs/1806.pdf" target="_blank">View</a>
                                      
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  2
                              </td>
                              <td>
                                  COPIES OF SOCIETIES/TRUST/COMPANY REGISTRATION/RENEWAL CERTIFICATE, AS APPLICABLE
                              </td>
                              <td>
                                  <input type="file" id="school_cert" wire:model="doc2" />
                                                                  <a href="cbsedocs/2938.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  3
                              </td>
                              <td>
                                  COPY OF NO OBJECTION CERTIFICATE (NOC) ISSUED, IF APPLICABLE, BY THE STATE GOVT./UT
                              </td>
                              <td>
                                  <input type="file" id="school_noc" wire:model="doc3" />
                                                                  <a href="cbsedocs/3786.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  4
                              </td>
                              <td>
                                  COPIES OF RECOGNITION CERTIFICATE UNDER RTE ACT, 2009, AND IT’S RENEWAL IF APPLICABLE
                              </td>
                              <td>
                                  <input type="file" id="school_reco" wire:model="doc4" />
                                                                  <a href="cbsedocs/4089.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  5
                              </td>
                              <td>
                                  COPY OF VALID BUILDING SAFETY CERTIFICATE AS PER THE NATIONAL BUILDING CODE
                              </td>
                              <td>
                                  <input type="file" id="school_bdgsafety" wire:model="doc5" />
                                                                  <a href="cbsedocs/5236.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  6
                              </td>
                              <td>
                                  COPY OF VALID FIRE SAFETY CERTIFICATE ISSUED BY THE COMPETENT AUTHORITY
                              </td>
                              <td>
                                  <input type="file" id="school_firesafety" wire:model="doc6" />
                                                                  <a href="cbsedocs/6879.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  7
                              </td>
                              <td>
                                  COPY OF THE DEO CERTIFICATE SUBMITTED BY THE SCHOOL FOR AFFILIATION/UPGRADATION/EXTENSION OF AFFILIATIONOR SELF CERTIFICATION BY SCHOOL
                              </td>
                              <td>
                                  <input type="file" id="school_deo" wire:model="doc7" />
                                                                  <a href="cbsedocs/7444.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  8
                              </td>
                              <td>
                                  COPIES OF VALID WATER, HEALTH AND SANITATION CERTIFICATES
                              </td>
                              <td>
                                  <input type="file" id="school_sanitise" wire:model="doc8" />
                                                                  <a href="cbsedocs/8441.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          </tbody>
                      </table>
                      <div style="text-align:left; margin-bottom: 15px;"><strong>NOTE: </strong> <span>THE SCHOOLS NEEDS TO UPLOAD THE SELF ATTESTED COPIES OF ABOVE LISTED DOCUMETNS BY CHAIRMAN/MANAGER/SECRETARY AND PRINCIPAL. IN CASE, IT IS NOTICED AT LATER STAGE THAT UPLOADED DOCUMENTS ARE NOT GENUINE THEN SCHOOL SHALL BE LIABLE FOR ACTION AS PER NORMS.</span></div>
                      <div style="text-align:left;"><strong>C:</strong> <span><strong><u>RESULT AND ACADEMICS:</u></strong></span></div>
                      <table class="table table-bordered mb-4">
                          <thead class="table-primary">
                              <tr>
                                  <td>
                                      <strong>S.NO.</strong>
                                  </td>
                                  <td>
                                      <strong>DOCUMENTS/INFORMATION</strong>
                                  </td>
                                  <td>
                                      <strong>UPLOAD DOCUMENTS</strong>
                                  </td>
                              </tr>
                          </thead>
                          </tbody>
                          <tr>
                              <td>
                                  1
                              </td>
                              <td>
                                  FEE STRUCTURE OF THE SCHOOL
                              </td>
                              <td>
                                  <input type="file" id="school_fee" wire:model="doc1_aca" />
                                                                  <a href="cbsedocs/9167.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  2
                              </td>
                              <td>
                                  ANNUAL ACADEMIC CALANDER.
                              </td>
                              <td>
                                  <input type="file" id="school_calendar" wire:model="doc2_aca" />
                                                                  <a href="cbsedocs/10210.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  3
                              </td>
                              <td>
                                  LIST OF SCHOOL MANAGEMENT COMMITTEE (SMC)
                              </td>
                              <td>
                                  <input type="file" id="school_committe" wire:model="doc3_aca" />
                                                                  <a href="cbsedocs/11381.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  4
                              </td>
                              <td>
                                  LIST OF PARENTS TEACHERS ASSOCIATION (PTA) MEMBERS
                              </td>
                              <td>
                                  <input type="file" id="school_pta" wire:model="doc4_aca" />
                                                                  <a href="cbsedocs/12672.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          <tr>
                              <td>
                                  5
                              </td>
                              <td>
                                  LAST THREE-YEAR RESULT OF THE BOARD EXAMINATION AS PER APPLICABLILITY
                              </td>
                              <td>
                                  <input type="file" id="school_result" wire:model="doc5_aca" />
                                                                  <a href="cbsedocs/13636.pdf" target="_blank">View</a>
                                                          </td>
                          </tr>
                          </tbody>
                      </table>
                      <div style="text-align:left;"><strong>RESULT CLASS: X</strong></div>
                      <table class="table table-bordered mb-4">
                          <thead class="table-primary">
                              <tr>
                                  <td>
                                      <strong>S.NO.</strong>
                                  </td>
                                  <td>
                                      <strong>YEAR</strong>
                                  </td>
                                  <td>
                                      <strong> NO. OF REGISTERED STUDENTS</strong>
                                  </td>
                                  <td>
                                      <strong> NO. OF STUDENTS PASSED </strong>
                                  </td>
                                  <td>
                                      <strong> PASS PERCENTAGE</strong>
                                  </td>
                                  <td>
                                      <strong> REMARKS</strong>
                                  </td>
                              </tr>
                          </thead>
                          </tbody>
                          <tr>
                              <td>
                                  1
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.1.r1" id="r1" value="2020"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.2.r2" id="r2" value="42"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.3.r3" id="r3" value="42"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.4.r4" id="r4" value="100"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.5.r5" id="r5" value="Passed"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  2
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.6.r1" id="r6" value="2019"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.7.r2" id="r7" value="70"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.8.r3" id="r8" value="70"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.9.r4" id="r9" value="100"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.10.r5" id="r10" value="Passed"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  3
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.11.r1" id="r11" value="2018"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="r2.3" id="toAdd.12.r2" value="64"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="r3.3" id="toAdd.13.r3" value="64"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="r4.3" id="toAdd.14.r4" value="100"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="r5.3" id="toAdd.15.r5" value="PASSED"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  4
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.16.r1" id="r16" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.17.r2" id="r17" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.18.r3" id="r18" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.19.r4" id="r19" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="toAdd.20.r5" id="r20" value=""/>
                              </td>
                          </tr>
                          </tbody>
                      </table>
                      <div style="text-align:left;"><strong>RESULT CLASS: XII</strong></div>
                      <table class="table table-bordered mb-4">
                          <thead class="table-primary">
                              <tr>
                                  <td>
                                      <strong>S.NO.</strong>
                                  </td>
                                  <td>
                                      <strong>YEAR</strong>
                                  </td>
                                  <td>
                                      <strong> NO. OF REGISTERED STUDENTS</strong>
                                  </td>
                                  <td>
                                      <strong> NO. OF STUDENTS PASSED </strong>
                                  </td>
                                  <td>
                                      <strong> PASS PERCENTAGE</strong>
                                  </td>
                                  <td>
                                      <strong> REMARKS</strong>
                                  </td>
                              </tr>
                          </thead>
                          </tbody>
                          <tr>
                              <td>
                                  1
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s1" id="s1" value="2020"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s2" id="s2" value="20"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s3" id="s3" value="20"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s4" id="s4" value="100"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s5" id="s5" value="PASSED"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  2
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s6" id="s6" value="2019"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s7" id="s7" value="10"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s8" id="s8" value="10"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s9" id="s9" value="100"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s10" id="s10" value="PASSED"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  3
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s11" id="s11" value="2018"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s12" id="s12" value="17"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s13" id="s13" value="17"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s14" id="s14" value="100"/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s15" id="s15" value="PASSED"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  4
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s16" id="s16" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s17" id="s17" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s18" id="s18" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s19" id="s19" value=""/>
                              </td>
                              <td>
                                  <input type="text" class="form-control" wire:model="s20" id="s20" value=""/>
                              </td>
                          </tr>
                          </tbody>
                      </table>
                      <div style="text-align:left;"><strong>D:</strong> <span><strong><u>STAFF (TEACHING)</u></strong></span></div>
                      <table class="table table-bordered mb-4">
                          <thead class="table-primary">
                              <tr>
                                  <td>
                                      <strong>S.NO.</strong>
                                  </td>
                                  <td>
                                      <strong>INFORMATION</strong>
                                  </td>
                                  <td>
                                      <strong>DETAILS</strong>
                                  </td>
                              </tr>
                          </thead>
                          </tbody>
                          <tr>
                              <td>
                                  1
                              </td>
                              <td>
                                  PRINCIPAL
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="principal_name" wire:model="principal_name" value="Mrs. Jyoti Mahajan"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  2
                              </td>
                              <td>
                                  TOTAL NO. OF TEACHERS
                              </td>
                              <td><input type="text" class="form-control" id="school_teachers" wire:model="school_teachers" value="21"/></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td>PGT</td>
                              <td>
                                  <input type="text" class="form-control" id="school_pgt" wire:model="school_pgt" value="04"/>
                              </td>
                          </tr>
                          <tr>
                              <td></td>
                              <td>TGT</td>
                              <td>
                                  <input type="text" class="form-control" id="school_tgt" wire:model="school_tgt" value="08"/>
                              </td>
                          </tr>
                          <tr>
                              <td></td>
                              <td>PRT</td>
                              <td>
                                  <input type="text" class="form-control" id="school_prt" wire:model="school_prt" value="07"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  3
                              </td>
                              <td>
                                  TEACHERS SECTION RATIO
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="school_ratio" wire:model="school_ratio" value="3:1"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  4
                              </td>
                              <td>
                                  DETAILS OF SPECIAL EDUCATOR
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="school_educator" wire:model="school_educator" value="0"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  5
                              </td>
                              <td>
                                  DETAILS OF COUNSELLOR AND WELNESS TEACHER
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="school_cousellor" wire:model="school_cousellor" value="1"/>
                              </td>
                          </tr>
                          </tbody>
                      </table>
                      <div style="text-align:left;"><strong>E:</strong> <span><strong><u>SCHOOL INFRASTRUCTURE:</u></strong></span></div>
                      <table class="table table-bordered mb-4">
                          <thead class="table-primary">
                              <tr>
                                  <td>
                                      <strong>S.NO.</strong>
                                  </td>
                                  <td>
                                      <strong>INFORMATION</strong>
                                  </td>
                                  <td>
                                      <strong>DETAILS</strong>
                                  </td>
                              </tr>
                          </thead>
                          </tbody>
                          <tr>
                              <td>
                                  1
                              </td>
                              <td>
                                  TOTAL CAMPUS AREA OF THE SCHOOL (IN SQUARE MTR)
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="school_area" wire:model="school_area" value="8064 Sq.mts."/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  2
                              </td>
                              <td>
                                  NO. AND SIZE OF THE CLASS ROOMS (IN SQ MTR)
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="school_rooms" wire:model="school_rooms" value="42 Classrooms with 43.48 Sq.mts. each"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  3
                              </td>
                              <td>
                                  NO. AND SIZE OF LABORATORIES INCLUDING COMPUTER LABS (IN SQ MTR
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="school_labs" wire:model="school_labs" value="5"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  4
                              </td>
                              <td>
                                  INTERNET FACILITY (Y/N)
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="school_internet" wire:model="school_internet" value="Y"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  5
                              </td>
                              <td>
                                  NO. OF GIRLS TOILETS
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="toilet_girls" wire:model="toilet_girls" value="06"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  6
                              </td>
                              <td>
                                  NO. OF BOYS TOILETS
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="toilet_boys" wire:model="toilet_boys" value="12"/>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  7
                              </td>
                              <td>
                                  LINK OF YOUTUBE VIDEO OF THE INSPECTION OF SCHOOL COVERING THE INFRASTRUCTURE OF THE SCHOOL
                              </td>
                              <td><input type="text" class="form-control" id="school_youtube" wire:model="school_youtube" value="https://www.youtube.com/watch?v=7-3XMujf5EA"/></td>
                          </tr>
                          </tbody>
                      </table>


                      <button type="submit" value="Submit" class="immiPressBtn">
                                                <span>Submit</span>
                                            </button>
                                           

                                     


                  </div>
                </div>
                <!--end row-->
              </form>                    
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->

</div>
