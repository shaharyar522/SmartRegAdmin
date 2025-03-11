<style>
    /* Top Section: Buttons */
    .top-section {
        padding-top: 26px;
        display: flex;
        justify-content: center;
        gap: 22px;
        margin-bottom: 62px;
    }

    .btn {
        background-color: #00246B;
        color: white;
        padding: 14px 28px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.2s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .btn:hover {
        background-color: #1a3d70;
        transform: scale(1.05);
    }


    /* Middle Section: Containers */
    .middle-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .container {
        background-color: #2a4479c7;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .container h2 {
        margin-top: 0;
        font-size: 25px;
        color: white;
        text-align: center;
    }

    .slider-display,
    .news-display,
    .marquee-display {
        margin-top: 18px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e9ecef;
        border-radius: 5px;
        color: #666;
    }

    /* Bottom Section: Interactive Form */
    .form-container {
        display: none;
        background-color: #2a4479;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .form-container.active {
        display: block;
    }

    .form-container h3 {
        color: white;
        text-align: center;
    }

    .form-container input,
    .form-container textarea {
        background-color: #2a4479;
        margin-top: 12px;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        color: white;
    }

    .form-container input::placeholder,
    .form-container textarea::placeholder {
        color: rgba(255, 255, 255, 0.8);
    }

    .form-container button {
        width: 100%;
        padding: 10px 20px;
        background-color: #00246B;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .form-container button:hover {
        background-color: #1a3d70;
        transform: scale(1.05);
    }

    .container-two {
        width: 100%;
        margin-top: 20px;
        clear: both;
        display: block;
    }

    /* Responsive Fixes */
    @media (max-width: 768px) {
        .top-section {
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .btn {
            width: 80%;
            text-align: center;
        }

        .middle-section {
            grid-template-columns: 1fr;
        }

        .form-container {
            max-width: 90%;
        }
    }
</style>
<!-- Buttons to show Forms -->
<div class="top-section">
    <button id="sliderBtn" class="btn" style="background-color: #00246B; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">Slider</button>

    <button id="newsBtn" class="btn" style="background-color: #00246B; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">News</button>

    <button id="marqueeBtn" class="btn" style="background-color: #00246B; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">Marquee</button>

</div>
<!-- Forms Section -->
<div id="formSection" class="bottom-section">
    <div class="form-container" id="sliderForm" style="display:none;">
        <h3>Add Slider Image</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="sliderTitle" placeholder="Enter title" required>
            <input type="file" name="sliderImage" accept="image/*" required>
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
    <div class="form-container" id="newsForm" style="display:none;">
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