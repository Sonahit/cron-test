document.querySelector(".items").addEventListener("click", e => {
  e.preventDefault();
  const target = e.target;
  if (target.classList.contains("link")) {
    //Assume we have entry__desc
    const desc = target.parentNode.querySelector(".entry__desc");
    if (desc) {
      const paragraphs = desc.querySelectorAll("p");
      Array.from(paragraphs).forEach(p => {
        const isHidden = p.style.display === "none";
        if (isHidden) {
          p.style.display = "block";
        } else {
          p.style.display = "none";
        }
      });
    }
  }
});
