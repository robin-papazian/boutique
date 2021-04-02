window.onload = () => {

    let stripe = Stripe('pk_test_51IaMu4HqeeBCX3z43UeTzPnYsfbotkez8GLXKOgILUb0AQRqlhTUJkGg8BVxm28bHiHYVwKfYgAAiTpBhK5NQT2h00ybkAbNeF')
    let elements = stripe.elements()
    let redirect = "index.php"

    let cardHolderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById("card-button")
    let clientSecret = cardButton.dataset.secret;

    let card = elements.create("card")
    card.mount("#cards-elements")

    card.addEventListener("change", (event) => {
        let displayError = document.getElementById("card-errors")
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    })

    cardButton.addEventListener("click", () => {
        stripe.handleCardPayment(
            clientSecret, card, {
            payment_method_data: {
                billing_details: { name: cardHolderName.value }
            }
        }
        ).then((result) => {
            if (result.error) {
                document.getElementById("errors").innerText = result.error.message;
            } else {
                document.location.href = redirect
            }
        })
    })
}
