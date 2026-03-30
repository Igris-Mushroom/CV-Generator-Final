<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Generator</title>
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>

    <form action="./view/displayCV.php" id="cv_form" method="post" enctype="multipart/form-data">
        <div class="container">

            <div class="subcontainer">
                <h1>Contact Information</h1>
                <div class="title">
                    <div class="left group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" name="fullname" placeholder="Cabillo, Albert Xyron L." required>

                        <label for="professional_title">Professional Title:</label>
                        <input type="text" name="professional_title" placeholder="e.g. IT Student / Full-Stack Developer">

                        <label for="telephone">Contact Number:</label>
                        <input type="tel" name="telephone" placeholder="09198455191" maxlength="11" required>

                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="albertxyroncabillo@gmail.com" required>

                        <label for="portfolio">Portfolio / GitHub:</label>
                        <input type="url" name="portfolio" placeholder="https://github.com/profile">

                        <label for="address">Address:</label>
                        <input type="text" name="address" placeholder="Ormoc City, Leyte">
                    </div>
                    <div class="rightgroup">
                        <label for="profile_pic">ID Picture:</label>
                        <input type="file" name="profile_pic" id="imageInput" accept="image/*">

                        <div id="imagePreviewContainer" style="margin-top: 15px; text-align: center;">
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 150px; height: 150px; object-fit: cover; border-radius: 8px; border: 2px solid #ddd;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="subcontainer">
                <h1>Professional Profile</h1>
                <div class="title">
                    <textarea name="professional_profile" rows="4" placeholder="Briefly describe your professional background..."></textarea>
                </div>
            </div>

            <div class="subcontainer" id="education-section">
                <h1>Education</h1>
                <div class="dynamic-wrapper">
                    <div class="title entry">
                        <div class="left group">
                            <input type="text" name="degree[]" placeholder="Degree">
                            <input type="text" name="institution[]" placeholder="Institution">
                            <input type="text" name="thesis[]" placeholder="Thesis/Dissertation Title">
                        </div>
                        <div class="rightgroup">
                            <input type="text" name="grad_date[]" placeholder="Date of Graduation">
                            <input type="text" name="coursework[]" placeholder="Relevant Coursework">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addFields('education-section')">+ Add Education</button>
            </div>

            <div class="subcontainer" id="experience-section">
                <h1>Professional Experience</h1>
                <div class="dynamic-wrapper">
                    <div class="title entry">
                        <div class="left group">
                            <input type="text" name="job_title[]" placeholder="Job Title">
                            <input type="text" name="emp_date[]" placeholder="Date of Employment">
                        </div>
                        <div class="rightgroup">
                            <input type="text" name="company[]" placeholder="Company">
                            <textarea name="duties[]" placeholder="Duties and Responsibilities"></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addFields('experience-section')">+ Add Experience</button>
            </div>

            <div class="subcontainer" id="skills-section">
                <h1>Technical Skills</h1>
                <div class="dynamic-wrapper">
                    <div class="title entry">
                        <div class="left group">
                            <input type="text" name="tools[]" placeholder="Tools (e.g. VS Code, Git)">
                        </div>
                        <div class="rightgroup">
                            <input type="text" name="hard_skills[]" placeholder="Hard Skills (e.g. PHP, Networking)">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addFields('skills-section')">+ Add Skill Set</button>
            </div>

            <div class="subcontainer" id="projects-section">
                <h1>Projects and Research</h1>
                <div class="dynamic-wrapper">
                    <div class="title entry">
                        <div class="left group">
                            <input type="text" name="project_title[]" placeholder="Project Title">
                            <textarea name="project_desc[]" placeholder="Project Description"></textarea>
                            <input type="url" name="project_link[]" placeholder="Link or Documentation">
                        </div>
                        <div class="rightgroup">
                            <input type="text" name="project_role[]" placeholder="Role">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addFields('projects-section')">+ Add Project</button>
            </div>

            <div class="subcontainer" id="certs-section">
                <h1>Certifications</h1>
                <div class="dynamic-wrapper">
                    <div class="title entry">
                        <div class="left group">
                            <input type="text" name="cert_name[]" placeholder="Certificate Name">
                            <input type="text" name="cert_date[]" placeholder="Date Obtained">
                        </div>
                        <div class="rightgroup">
                            <input type="text" name="issuing_org[]" placeholder="Issuing Organization">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addFields('certs-section')">+ Add Certification</button>
            </div>

            <div class="subcontainer" id="orgs-section">
                <h1>Organizations and Leadership</h1>
                <div class="dynamic-wrapper">
                    <div class="title entry">
                        <div class="left group">
                            <input type="text" name="position[]" placeholder="Position Title">
                            <input type="text" name="contribution[]" placeholder="Key Contribution">
                        </div>
                        <div class="rightgroup">
                            <input type="text" name="org_name[]" placeholder="Organization Name">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addFields('orgs-section')">+ Add Organization</button>
            </div>

            <div class="subcontainer">
                <h1>Languages</h1>
                <div class="title">
                    <input type="text" name="languages" placeholder="e.g. English, Tagalog, Cebuano">
                </div>
            </div>

            <div class="subcontainer" id="ref-section">
                <h1>References</h1>
                <div class="dynamic-wrapper">
                    <div class="title entry">
                        <div class="left group">
                            <input type="text" name="ref_name[]" placeholder="Reference Name">
                            <input type="text" name="ref_company[]" placeholder="Company/Organization">
                            <input type="text" name="ref_address[]" placeholder="Address">
                        </div>
                        <div class="rightgroup">
                            <input type="text" name="ref_job[]" placeholder="Current Job">
                            <input type="text" name="ref_rel[]" placeholder="Relationship">
                            <input type="tel" name="ref_contact[]" placeholder="Contact Number">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addFields('ref-section')">+ Add Reference</button>
            </div>

            <div style="text-align: center; padding: 40px;">
                <button type="submit" class="btn-generate">Generate CV</button>
            </div>
        </div>

    </form>

    <script src="./assets/js/index.js"></script>
</body>

</html>