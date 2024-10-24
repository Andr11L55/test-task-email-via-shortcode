function goToStep(step) {

    if (step === 3) {
        const quantity = document.getElementById('quantity').value;


        if (!quantity || quantity < 1 || quantity > 1000 || isNaN(quantity)) {
            document.getElementById('quantity-error').classList.remove('d-none');
            return;
        } else {
            document.getElementById('quantity-error').classList.add('d-none');
        }



        let price = 0;
        if (quantity >= 1 && quantity <= 10) {
            price = 10;
        } else if (quantity >= 11 && quantity <= 100) {
            price = 100;
        } else if (quantity >= 101 && quantity <= 1000) {
            price = 1000;
        }


        document.querySelector('#step-3 #price').textContent = `$${price}`;
    }


    document.querySelectorAll('.wizard-step').forEach(function (el) {
        el.classList.add('d-none');
    });


    document.getElementById('step-' + step).classList.remove('d-none');


    document.querySelectorAll('.nav-link').forEach(function (el) {
        console.log(el);
        el.classList.remove('active');
    });

    document.querySelector('#step' + step + '-link').classList.add('active');
}

function validateContactInfo() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();


    if ( !email) {
        document.getElementById('contact-error').classList.remove('d-none');
        return;
    } else {
        document.getElementById('contact-error').classList.add('d-none');
    }


    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        document.getElementById('contact-error').classList.remove('d-none');
        return;
    }


    goToStep(2);
}



function sendForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const quantity = document.getElementById('quantity').value;
    const price = document.getElementById('price').innerHTML;

    jQuery.ajax({
        url: '/wp-admin/admin-ajax.php',
        type: 'POST',
        data: {
            action: 'send_email',
            name: name,
            email: email,
            phone: phone,
            quantity: quantity,
            price: price,
        },
        success: function(response) {
            goToStep(4);
            if (response.success) {
                document.getElementById('success-message').classList.remove('d-none');
                document.getElementById('error-message').classList.add('d-none');
            } else {
                document.getElementById('error-message').classList.remove('d-none');
                document.getElementById('success-message').classList.add('d-none');
            }
        },
        error: function() {
            goToStep(4);
            document.getElementById('error-message').classList.remove('d-none');
            document.getElementById('success-message').classList.add('d-none');
        }
    });
}

function restartWizard() {
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('quantity').value = '';
    goToStep(1);
}
