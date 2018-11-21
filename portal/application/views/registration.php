<?php 

  $theme_path = THEMEPATH;

  $portal_path = PORTALPATH;

?>



<body>

<div class="admin-form">

  <div class="container">

    <div class="row">

      <div class="col-lg-12">

        <!-- Widget starts -->

            <div class="widget wred">

              <div class="widget-head">

                <i class="fa fa-lock"></i> Register 

              </div>

              <div class="widget-content">

                <div class="padd">

                  <form action="<?php echo $portal_path;?>account/registration_validation" method="POST" accept-charset="utf-8" class="form-horizontal">

                    <!-- Registration form starts -->

                    <!-- Name -->

                  <div class="form-group">

                    <label class="control-label col-lg-3" for="name">First Name</label>

                    <div class="col-lg-9">

                      <input type="text" class="form-control" id="f_name" name="f_name">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-lg-3" for="name">Last Name</label>

                    <div class="col-lg-9">

                      <input type="text" class="form-control" id="l_name" name="l_name">

                    </div>

                  </div>

                  <!-- Company Name -->

                  <div class="form-group">

                    <!--<label class="control-label col-lg-3" for="company">Company Name</label>-->

                    <div class="col-lg-9">

                      <input type="hidden" class="form-control" id="company" name="company" value=".">

                    </div>

                  </div>

                  <!-- Title -->

                  <div class="form-group">

                    <!--<label class="control-label col-lg-3" for="title">Title</label>-->

                    <div class="col-lg-4">

                      <input type="hidden" class="form-control" id="title" name="title" value=".">

                    </div>

                  </div>

                  <!-- Address -->

                  <div class="form-group">

                    <div class="row-lg-4">

                      <label class="control-label col-lg-3" for="address">Address</label>

                      <div class="col-lg-9">

                        <input type="text" class="form-control" id="address" name="address">

                        <input type="text" class="form-control" id="address2" name="address2">

                      </div>

                    </div>

                    <div class="row-lg-4">

                      <label class="control-label col-lg-3" for="city">City</label>

                      <div class="col-lg-3">

                        <input type="text" class="form-control" id="city" name="city">

                      </div>

                      <label class="control-label col-lg-2" for="state">State</label>

                      <div class="col-lg-4">

                        <input type="text" class="form-control" id="state" name="state">

                      </div>

                    </div>

                    <div class="row-lg-4">

                      <label class="control-label col-lg-3" for="zip">Zip</label>

                      <div class="col-lg-3">

                        <input type="text" class="form-control" id="zip" name="zip">

                      </div>

                      <label class="control-label col-lg-2" for="country">Country</label>

                      <div class="col-lg-4">

                         <select class="form-control" name="country" id="country">
                            <option value="US">United States</option> 
                  

                  <?php

                  

                    if($countries!=FALSE){

                      foreach($countries->result_array() as $row){

                        echo '<option value="'.$row['code'].'"';if( $row['code'] == $geoplugin){ echo 'selected="selected"';}

                        echo '>'.$row['country'].'</option>';

                      }  

                    }

                  ?>



                         </select>

                      </div>

                    </div>

                  </div>



                  <!-- Email -->

                  <div class="form-group">

                    <label class="control-label col-lg-3" for="email">Email</label>

                    <div class="col-lg-9">

                      <input type="text" class="form-control" id="email" name="email">

                    </div>

                  </div>

                  <!--Password -->

                  <div class="form-group">

                    <label class="control-label col-lg-3" for="password">Password</label>

                    <div class="col-lg-9">

                      <input type="password" class="form-control" id="password" name="password">

                    </div>

                  </div>

                  <!-- Confirm Password -->

                  <div class="form-group">

                    <label class="control-label col-lg-3" for="password">Confirm Password</label>

                    <div class="col-lg-9">

                      <input type="password" class="form-control" id="cpassword" name="cpassword">

                    </div>

                  </div>

                  <!-- Accept box and button submit-->

                  <div class="form-group">

                    <div class="col-lg-9 col-lg-offset-3">

                      <div class="checkbox">

                        <label>

                          <input type="checkbox" id="accept_terms" name="accept_terms" value="yes"> 

                         <a id="myBtn"> Accept Terms &amp; Conditions </a>

                        </label>

                      </div>

                      <br />



                      <button type="submit" class="btn btn-sm btn-info">Register</button>

                  </div>

                </div>

              </form>

              <?php echo validation_errors();?>

            </div>

          </div>

          <div class="widget-foot">

            Already Registred? <a href="<?php echo $portal_path?>."main>Login</a>

          </div>

        </div>  

      </div>

    </div>

  <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog modal-lg"">

    

      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-header" style="padding:35px 50px;">

          <a href="#" class="wclose"><i class="fa fa-times"></i></a>

          <h4><span class="glyphicon glyphicon-lock"></span> Information Exchange Agreement</h4>

        </div>

        <div class="modal-body" style="padding:40px 50px;">

<textarea style="resize:none" class="form-control" rows="25" id="contract" name="contract" readonly >

THIS INFORMATION EXCHANGE AGREEMENT (herein the “Agreement”) is dated and effective as of <?php echo date('l jS \of F Y A T');  ?>

(“Effective Date”), between Assured Tracking Inc, [on behalf of itself and its Affiliates / Partners], a Florida corporation,

with its corporate office located at 8230 Coral Way Miami FL 33155 (“ATInc”) and '__________________', [on behalf of itself and its Affiliates/Distributors/Partners], with current address

'________________________________________________________' (“ '________________'”). The terms

“Recipient” and “Discloser” refer to either ATInc or '________________', as the case may be.

R E C I T A L S

A. The parties acknowledge that it may be necessary for each of them, as Discloser, to provide to the other, as

Recipient, certain information, including trade secret information, considered to be confidential, valuable and

proprietary by Discloser. The RECITALS acknowledged in this agreement also applies to any use of ATInc’ products

and solutions on other geographic markets.

B. Such information may include, but is not limited to, technical, financial, marketing, staffing and business

plans and information, strategic information, proposals, requests for proposals, specifications, drawings, prices, costs,

customer information, procedures, proposed products, processes, business systems, software programs, techniques,

services and like information of, or provided by, Discloser, its Affiliates or any of their third party suppliers or agents,

and also includes the fact that such information has been provided by the Discloser, the fact that the parties are

discussing the Project and any terms, conditions or other facts with respect to the Project (collectively Discloser’s

“Information”). Information provided by one party to the other before execution of this Agreement and in connection

with the Project is also subject to the terms of this Agreement. “Affiliates” means any company owned in whole or

in part, now or in the future, directly or indirectly through a subsidiary, by a party hereto or under common ownership,

in whole or in part, with a party, unless such Affiliate is in competition with the Discloser.

IN CONSIDERATION of the mutual promises and obligations contained herein and for other good and valuable

consideration, the receipt and sufficiency of which are acknowledged, the parties agree as follows:

1. Recipient will protect Information provided to Recipient by or on behalf of Discloser from any use, distribution or

disclosure except as permitted herein. Recipient will use the same standard of care to protect Information as Recipient

uses to protect its own similar confidential and proprietary information, but not less than a reasonable standard of

care.

2. Recipient agrees to use Information solely in connection with the Project and for no other purpose. Recipient may

provide Information only to Recipient’s employees who: (a) have a substantive need to know such Information in

connection with the Project; (b) have been advised of the confidential and proprietary nature of such Information;

and (c) have personally agreed with Recipient in writing to protect from unauthorized disclosure all confidential and

proprietary information, of whatever source, to which they have access in the course of their employment. A party

may provide the other party’s information to affiliates, parents, consultants, contractors and agents, subject to (a)

through (b) above. As a result, the affiliates, parents, consultants, contractors and agents MUST NOT benefit in any

form from this information.

3. Information will be provided to Recipient in written or other tangible or electronic form and must be marked with

a confidential and proprietary notice. Information orally or visually provided to Recipient must be designated by

Discloser as confidential and proprietary at the time of such disclosure and must be reduced to writing marked with

a confidential and proprietary notice and provided to Recipient within thirty (30) calendar days after such disclosure.

Notwithstanding the failure of either party to mark or designate Information as confidential or to reduce it to writing

as described above, Information that by its nature or under the particular circumstances of disclosure should be

understood to be confidential or proprietary by a party exercising reasonable judgment shall be protected as set out

in this Agreement. Information also includes all information concerning the existence and progress of the parties'

dealings and the identity of ATInc’s vendors and strategic partners, regardless of whether any such information is

marked or otherwise identified in writing as confidential.

4. Discloser’s Information does not include:

a) any information publicly disclosed by Discloser;

b) any information Discloser in writing authorizes Recipient to disclose without restriction;

c) any information Recipient already lawfully knows at the time it is disclosed by Discloser, without an

obligation to keep it confidential;

d) any information Recipient lawfully obtains from any source other than Discloser, provided that such source

lawfully disclosed such information; or

e) any information Recipient independently develops without use of or reference to Discloser’s Information.

5. If the Recipient becomes legally obligated to disclose Information by any governmental entity with jurisdiction

over it, the Recipient will give the Discloser prompt written notice to allow the Disclosing Party to seek a protective

order or other appropriate remedy. Such notice must include, without limitation, identification of the Information to

be so disclosed and a copy of the order. The Recipient will disclose only such Information as is legally required and

will use its best reasonable efforts to obtain confidential treatment for any Information that is so disclosed.

6. Recipient may make tangible or electronic copies, notes, summaries or extracts of Information only as necessary

for use as authorized herein. All tangible or electronic copies, notes, summaries or extracts must be marked with the

same confidential and proprietary notice as appears on the original.

7. Information remains at all times the property of Discloser. Upon Discloser’s request, all or any requested portion

of the Information (including, but not limited to, tangible and electronic copies, notes, summaries or extracts of any

Information) will be promptly returned to Discloser or destroyed, and Recipient will provide Discloser with written

certification stating that such Information has been returned or destroyed.

8. Recipient will not identify Discloser, its Affiliates or any other owner of Information in any advertising, sales

material, press release, public disclosure or publicity without prior written authorization by Discloser. No license

under any trademark, patent, copyright, trade secret or other intellectual property right is either granted or implied by

disclosure of Information to Recipient.

9. The term of this Agreement shall be two (2) years or, if an employee of ATInc, 2 years after termination from its

Effective Date. The parties’ obligations hereunder commence on the Effective Date and extend with regard to all

Information until two (2) years after the date of final disclosure of Information hereunder. Thereafter, the Parties’

obligations hereunder survive and continue in effect with respect to any Information that is a trade secret under

applicable law. The Parties acknowledge and agree that personally identifiable customer information is a trade secret

and shall be protected as such.

10. This Agreement is not a commitment by either party to enter into any transaction or business relationship, nor is

it an inducement for either party to spend funds or resources. No such agreement will be binding unless and until

stated in a writing signed by both parties.

11. Recipient acknowledges and agrees that any breach or threatened breach of this Agreement is likely to cause

Discloser and its Affiliates irreparable harm for which money damages may not be an appropriate or sufficient

remedy. Recipient therefore agrees that Discloser or its Affiliates are entitled to receive injunctive or other equitable

relief to remedy or prevent any breach or threatened breach of this Agreement. Such remedy is not the exclusive

remedy for any breach or threatened breach of this Agreement, but is in addition to all other rights and remedies

available at law or in equity.

12. No forbearance, failure or delay in exercising any right, power or privilege is waiver thereof, nor does any single

or partial exercise thereof preclude any other or future exercise thereof, or the exercise of any other right, power or

privilege.

13. If and to the extent any provision of this Agreement is held invalid or unenforceable at law, such provision will

be deemed stricken from the Agreement and the remainder of the Agreement will continue in effect and be valid and

enforceable to the fullest extent permitted by law.

14. This Agreement is binding upon and inures to the benefit of the parties and their heirs, executors, legal and

personal representatives, successors and assigns, as the case may be.

15. This Agreement shall be deemed executed in the State of Florida U.S.A., and is to be governed and construed by

the Florida law, without regard to its choice of law provisions. The parties agree that jurisdiction and venue for any

action to enforce this Agreement are properly in the applicable federal or state court for Florida.

16. Both parties will comply with all applicable federal, state, and local statutes, rules and regulations, including, but

not limited to, United States export control laws and regulations as they currently exist and as they may be amended

from time to time.

17. Each party's obligations hereunder are in addition to, and not exclusive of, any and all of its other obligations and

duties to the other party, whether express, implied in fact or in law.

18 This Agreement is the entire agreement between the parties hereunder and may not be modified or amended except

by a written instrument signed by both parties. Each party has read this Agreement, understands it and agrees to be

bound by its terms and conditions. There are no understandings or representations with respect to the subject matter

hereof, express or implied, that are not stated herein. This Agreement may be executed in counterparts, and signatures

exchanged by facsimile or other electronic means are effective for all purposes hereunder to the same extent as

original signatures.

IN WITNESS WHEREOF, the parties’ authorized representatives have signed this Agreement:

ASSURED TRACKING INC

And on behalf of itself and its Affiliates and Partners



'__________________'

And on behalf of itself and its Affiliates and Partners







    (Digital Signature)                                           (Digital Signature)



Name: David Seijo                                               Name: '___________________________'

Title: President, CEO                                           Title:'__________________________' 

</textarea>

        </div>

        <div class="modal-footer">

          

        </div>

      </div>

    </div>

  </div>  

</div>

<script>

$(document).ready(function(){

    $("#myBtn").click(function(){

        $("#myModal").modal();

    });

});

var r_comp = "'__________________'";

var r_address = "'________________________________________________________'";

var r_abrev = "'________________'";

var r_name = "'___________________________'";

var r_title = "'__________________________'";

var textarea = $('#contract');

var comp = $('#company').val();

var abrev = "";

var address = $('#address').val();

var address2 = $('#address2').val();

var city = $('#city').val();

var state = $('#state').val();

var zip = $('#zip').val();

var country = $('#country').val();

var f_address = "";

var f_name = "";

var l_name = "";

var fullname = "";

var title = "";



function assemble_address(address, address2, city, state, zip, country) {

  if(address2!=""){

    return (address+" "+address2+" "+city+" "+state+" "+zip+" "+country);

  }

  return (address+" "+city+" "+state+" "+zip+" "+country);

}



function company_abrev(comp){

   return comp.split(" ", 1);

}



$(document).ready(function() {

    $('#company').change(function() {

      comp = $('#company').val().trim();

      if(comp!=""){

        textarea.val(textarea.val().replace(r_comp,comp));

        textarea.val(textarea.val().replace(r_comp,comp));

        r_comp = comp;

        abrev = company_abrev(comp);

        textarea.val(textarea.val().replace(r_abrev,abrev));

        textarea.val(textarea.val().replace(r_abrev,abrev));

        r_abrev = abrev;

      }

    });



    $('#f_name').change(function() {

      f_name = $('#f_name').val().trim();

      l_name = $('#l_name').val().trim();



      if(f_name!="" && l_name!=""){

        fullname = (f_name+" "+l_name);

        textarea.val(textarea.val().replace(r_name,fullname));

        r_name = fullname;

      }

    });



    $('#l_name').change(function() {

      f_name = $('#f_name').val().trim();

      l_name = $('#l_name').val().trim();



      if(f_name!="" && l_name!=""){

        fullname = (f_name+" "+l_name);

        textarea.val(textarea.val().replace(r_name,fullname));

        r_name = fullname;

      }

    });



    $('#title').change(function() {

      title = $('#title').val().trim();



      if(title!=""){

        textarea.val(textarea.val().replace(r_title,title));

        r_title = title;

      }

    });





    $('#address').change(function() {

      address = $('#address').val().trim();

      address2 = $('#address2').val().trim();

      city = $('#city').val().trim();

      state = $('#state').val().trim();

      zip = $('#zip').val().trim();

      country = $('#country').val().trim();



      if(address!="" && city!="" && state!="" && zip!="" && country!=""){

        f_address = assemble_address(address, address2, city, state, zip, country);

        textarea.val(textarea.val().replace(r_address,f_address));

        r_address = f_address;

      }

    });



    $('#address2').change(function() {

      address = $('#address').val().trim();

      address2 = $('#address2').val().trim();

      city = $('#city').val().trim();

      state = $('#state').val().trim();

      zip = $('#zip').val().trim();

      country = $('#country').val().trim();



      if(address!="" && city!="" && state!="" && zip!="" && country!=""){

        f_address = assemble_address(address, address2, city, state, zip, country);

        textarea.val(textarea.val().replace(r_address,f_address));

        r_address = f_address;

      }

    });

    $('#city').change(function() {

      address = $('#address').val().trim();

      address2 = $('#address2').val().trim();

      city = $('#city').val().trim();

      state = $('#state').val().trim();

      zip = $('#zip').val().trim();

      country = $('#country').val().trim();



      if(address!="" && city!="" && state!="" && zip!="" && country!=""){

        f_address = assemble_address(address, address2, city, state, zip, country);

        textarea.val(textarea.val().replace(r_address,f_address));

        r_address = f_address;

      }

    });

    $('#state').change(function() {

      address = $('#address').val().trim();

      address2 = $('#address2').val().trim();

      city = $('#city').val().trim();

      state = $('#state').val().trim();

      zip = $('#zip').val().trim();

      country = $('#country').val().trim();



      if(address!="" && city!="" && state!="" && zip!="" && country!=""){

        f_address = assemble_address(address, address2, city, state, zip, country);

        textarea.val(textarea.val().replace(r_address,f_address));

        r_address = f_address;

      }

    });

    $('#zip').change(function() {

      address = $('#address').val().trim();

      address2 = $('#address2').val().trim();

      city = $('#city').val().trim();

      state = $('#state').val().trim();

      zip = $('#zip').val().trim();

      country = $('#country').val().trim();



      if(address!="" && city!="" && state!="" && zip!="" && country!=""){

        f_address = assemble_address(address, address2, city, state, zip, country);

        textarea.val(textarea.val().replace(r_address,f_address));

        r_address = f_address;

      }

    });

    $('#country').change(function() {

      address = $('#address').val().trim();

      address2 = $('#address2').val().trim();

      city = $('#city').val().trim();

      state = $('#state').val().trim();

      zip = $('#zip').val().trim();

      country = $('#country').val().trim();

      

      if(address!="" && city!="" && state!="" && zip!="" && country!=""){

        f_address = assemble_address(address, address2, city, state, zip, country);

        textarea.val(textarea.val().replace(r_address,f_address));

        r_address = f_address;

      }

    });

});

</script>