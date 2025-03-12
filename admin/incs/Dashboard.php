<link rel="stylesheet" href="../admin/css/hidden_form.css">


<!-- Buttons to show Forms -->
<div class="top-section">
    <button id="countryBtn" class="btn" style="background-color: #00246B; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">Country</button>

    <button id="newsBtn" class="btn" style="background-color: #00246B; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">State</button>

    <button id="marqueeBtn" class="btn" style="background-color: #00246B; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">City</button>

</div>
<!-- Forms Section -->
<div id="formSection" class="bottom-section">
    <div class="form-container" id="countryform" style="display:none;">
        <h3>Add Country</h3>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="sliderTitle" placeholder="Enter title" required>
            <input type="file" name="sliderImage" accept="image/*" required>
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>

    </div>
    <div class="form-container" id="stateform" style="display:none;">
        <h3>Add News</h3>
        <form action="" method="POST">
            <input type="text" name="newsTitle" placeholder="Enter news title" required>
            <textarea name="newsDescription" placeholder="Enter news description" required></textarea>
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
    <div class="form-container" id="marqueeForm" style="display:none;">
        <h3>Add Marquee Text</h3>
        <form action="" method="POST">
            <input type="text" name="marqueeText" placeholder="Enter scrolling text" required>
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
    <div class="form-container" id="marqueeForm" style="display:none;">
        <h3>Add Marquee Text</h3>
        <form action="" method="POST">
            <input type="text" name="marqueeText" placeholder="Enter scrolling text" required>
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
</div>