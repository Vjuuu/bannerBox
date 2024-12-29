<?php include VIEWPATH.'./Users/Components/Header.php'; ?>
<div class="simple-page-container p-4">
    <h4 class="mb-4">Profile</h4>
    <form id="profileForm">

        <div class="form-group mb-4">
            <label class="fs-6 mb-2">Business Name</label>
            <input type="text" name="business_name" id="business_name" class="form-control form-control-dark" value="" maxlength="25" required></div>
        <div class="form-group mb-4">
            <label>Mobile</label>
            <input type="number" name="mobile_no" id="mobile_no" class="form-control form-control-dark" value="" required ></div>
        <div class="form-group mb-4">
            <label>Address</label>
            <textarea name="address" id="address" class="form-control form-control-dark" maxlength="50" required></textarea>
        </div>
        <button type="submit"  class="btn btn-primary w-100">Submit</button>
    </form>
</div>
<?php include VIEWPATH.'./Users/Components/Footer.php'; ?>

<script>
// Profile Form Submission
document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const logo = formData.get('logo');

    if (logo && logo.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onloadend = function() {
            localStorage.setItem('logo', reader.result);
            document.getElementById('logoPreview').src = reader.result;
        };
        reader.readAsDataURL(logo);
    }

    localStorage.setItem('business_name', formData.get('business_name'));
    localStorage.setItem('mobile_no', formData.get('mobile_no'));
    localStorage.setItem('address', formData.get('address'));

    if (confirm('Data saved to local storage! Would you like to proceed?')) {
        location.reload();
    } else {
        alert('You chose not to proceed.');
    }
});

// Logo Preview Update
// document.getElementById('logo').addEventListener('change', function(e) {
//     const logo = e.target.files[0];
//     if (logo) {
//         const reader = new FileReader();
//         reader.onloadend = function() {
//             document.getElementById('logoPreview').src = reader.result;
//         };
//         reader.readAsDataURL(logo);
//     }
// });

// Load User Data from LocalStorage
const userData = {
    business_name: localStorage.getItem('business_name'),
    phone_no: localStorage.getItem('mobile_no'),
    address: localStorage.getItem('address'),
    // appLogo: localStorage.getItem('logo')
};

if (userData.business_name) {
    document.getElementById('business_name').value = userData.business_name;
    document.getElementById('mobile_no').value = userData.phone_no;
    document.getElementById('address').value = userData.address;
    // document.getElementById('logoPreview').src = userData.appLogo
}
</script>