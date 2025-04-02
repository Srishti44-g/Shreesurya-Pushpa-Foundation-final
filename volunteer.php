<?php
$pageTitle = "Volunteer";
include 'includes/header.php';
?>

<section class="volunteer-section">
    <div class="container">
        <h2 class="section-title">Join Our Volunteer Team</h2>
        <p class="section-desc">Make a difference in your community by volunteering with Shreesurya Pushpa Foundation</p>

        <div class="volunteer-container">
            <div class="volunteer-info">
                <h3>Why Volunteer with Us?</h3>
                <ul class="volunteer-benefits">
                    <li>Gain valuable experience and skills</li>
                    <li>Make a positive impact in your community</li>
                    <li>Meet like-minded individuals</li>
                    <li>Receive a certificate of appreciation</li>
                </ul>
            </div>

            <div class="volunteer-form">
                <form id="volunteerForm" action="process_volunteer.php" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="interests">Areas of Interest</label>
                        <select id="interests" name="interests[]" multiple required>
                            <option value="Education">Education</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Environment">Environment</option>
                            <option value="Women Empowerment">Women Empowerment</option>
                            <option value="Skill Development">Skill Development</option>
                            <option value="Community Development">Community Development</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <input type="text" id="availability" name="availability" required>
                    </div>
                    <div class="form-group">
                        <label for="experience">Previous Experience</label>
                        <textarea id="experience" name="experience" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit-btn">Submit Application</button>
                    </div>
                    <div id="formStatus" class="form-status"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>