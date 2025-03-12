<link rel="stylesheet" href="../admin/css/hidden_form.css">


<!-- Buttons to show Forms -->
<div class="top-section">
    <button id="countryBtn" class="btn" style="background-color:#6AB187; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">Country</button>
    <button id="newsBtn" class="btn" style="background-color: #6AB187; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">State</button>

    <button id="marqueeBtn" class="btn" style="background-color: #6AB187; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">City</button>

</div>
<!-- Forms Section -->
<div id="formSection" class="bottom-section">
    <div class="form-container" id="countryform" style="display:none;">
        <h3>Add_Country</h3>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="country" placeholder="Add a Country">
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>

    </div>
    <div class="form-container" id="Stateform" style="display:none;">
        <h3>Add_State</h3>
        <form action="" method="POST">
          <input type="text" name="state" placeholder="Add a State">
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
    <div class="form-container" id="CityForm" style="display:none;">
        <h3>Add_City</h3>
        <form action="" method="POST">
           <input type="text" name="city" placeholder="Add a  City">
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
</div>