const modal = document.querySelector(".product-modal");
const modalTitle = modal.querySelector("#product-modal-titel");
const modalImage = modal.querySelector(".product-modal-afbeelding");
const modalSpecifications = modal.querySelector(".product-modal-specificaties");
const modalDescription = modal.querySelector(".product-modal-beschrijving");
const modalPrice = modal.querySelector(".product-modal-prijs");

document.querySelectorAll(".productkaart-knop").forEach((button) => {
    button.addEventListener("click", () => {
        const card = button.closest(".productkaart");
        const image = card.querySelector("img");

        modalTitle.textContent = card.querySelector("h3").textContent;
        modalImage.src = image.src;
        modalImage.alt = image.alt;
        modalSpecifications.textContent = card.querySelector(".product-specificaties").textContent;
        modalDescription.textContent = button.dataset.description;
        modalPrice.textContent = card.querySelector(".product-prijs").textContent;
        modal.showModal();
    });
});

modal.querySelector(".product-modal-sluiten").addEventListener("click", () => modal.close());

modal.addEventListener("click", (event) => {
    if (event.target === modal) modal.close();
});