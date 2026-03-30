<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Basic Information
    $fullname = $_POST['fullname'] ?? 'Name not provided';
    $professional_title = $_POST['professional_title'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $portfolio = $_POST['portfolio'] ?? '';
    $address = $_POST['address'] ?? '';
    $profile_profile = $_POST['professional_profile'] ?? '';
    $languages = $_POST['languages'] ?? '';

    // 2. Handle Image Upload
    $upload_dir = "../uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $image_src = "https://via.placeholder.com/150";
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $file_ext = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
        $file_name = "profile_" . time() . "." . $file_ext;
        $target_file = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
            $image_src = $target_file;
        }
    }

    // 3. Helper function
    function get_array_data($key)
    {
        return isset($_POST[$key]) && is_array($_POST[$key]) ? $_POST[$key] : [];
    }

    $degrees = get_array_data('degree');
    $institutions = get_array_data('institution');
    $theses = get_array_data('thesis');
    $grad_dates = get_array_data('grad_date');
    $courseworks = get_array_data('coursework');
    $jobs = get_array_data('job_title');
    $companies = get_array_data('company');
    $emp_dates = get_array_data('emp_date');
    $duties = get_array_data('duties');
    $tools = get_array_data('tools');
    $hardskills = get_array_data('hard_skills');
    $proj_titles = get_array_data('project_title');
    $proj_descs = get_array_data('project_desc');
    $proj_links = get_array_data('project_link');
    $proj_roles = get_array_data('project_role');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($fullname); ?> - CV</title>
    <link rel="stylesheet" href="../assets/css/displayCV.css">
</head>

<body>

    <div class="no-print" style="text-align:center; padding: 20px; background: #f4f4f4;">
        <button onclick="window.print()" class="btn-print">Print / Save as PDF</button>
    </div>

    <div class="cv-container">
        <aside class="sidebar">
            <div class="profile-section">
                <img src="<?php echo $image_src; ?>" alt="Profile Picture" class="profile-img">
            </div>

            <div class="sidebar-info">
                <h2>Contact</h2>
                <p>📞 <?php echo htmlspecialchars($telephone); ?></p>
                <p>✉️ <?php echo htmlspecialchars($email); ?></p>
                <p>📍 <?php echo htmlspecialchars($address); ?></p>
                <?php if ($portfolio): ?>
                    <p>🌐 <a href="<?php echo htmlspecialchars($portfolio); ?>" style="color: white; font-size: 0.8rem;"><?php echo htmlspecialchars($portfolio); ?></a></p>
                <?php endif; ?>
            </div>

            <div class="sidebar-info">
                <h2>Skills</h2>
                <ul>
                    <?php foreach ($hardskills as $skill): ?>
                        <li><?php echo htmlspecialchars($skill); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php if ($languages): ?>
                <div class="sidebar-info">
                    <h2>Languages</h2>
                    <p><?php echo htmlspecialchars($languages); ?></p>
                </div>
            <?php endif; ?>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <h1><?php echo htmlspecialchars($fullname); ?></h1>

                <?php if (!empty($professional_title)): ?>
                    <p class="job-subtitle"><?php echo htmlspecialchars($professional_title); ?></p>
                <?php endif; ?>
            </header>

            <?php if ($profile_profile): ?>
                <section class="content-section">
                    <h2 class="section-title">Profile</h2>
                    <p class="profile-text"><?php echo nl2br(htmlspecialchars($profile_profile)); ?></p>
                </section>
            <?php endif; ?>

            <section class="content-section">
                <h2 class="section-title">Work Experience</h2>
                <?php for ($i = 0; $i < count($jobs); $i++): ?>
                    <div class="entry">
                        <div class="entry-header">
                            <strong><?php echo htmlspecialchars($jobs[$i]); ?></strong>
                            <span><?php echo htmlspecialchars($emp_dates[$i]); ?></span>
                        </div>
                        <div class="entry-sub"><em><?php echo htmlspecialchars($companies[$i]); ?></em></div>
                        <p class="entry-details"><?php echo nl2br(htmlspecialchars($duties[$i])); ?></p>
                    </div>
                <?php endfor; ?>
            </section>

            <section class="content-section">
                <h2 class="section-title">Education</h2>
                <?php for ($i = 0; $i < count($degrees); $i++): ?>
                    <div class="entry">
                        <div class="entry-header">
                            <strong><?php echo htmlspecialchars($degrees[$i]); ?></strong>
                            <span><?php echo htmlspecialchars($grad_dates[$i]); ?></span>
                        </div>
                        <div class="entry-sub"><?php echo htmlspecialchars($institutions[$i]); ?></div>
                        <?php if ($theses[$i]): ?>
                            <small>Thesis: <?php echo htmlspecialchars($theses[$i]); ?></small>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </section>
        </main>
    </div>

</body>

</html>