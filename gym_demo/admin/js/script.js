
function showToast(message, type="success") {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.className = `toast show ${type}`;
    
    setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}


function checkMsgParam() {
    const params = new URLSearchParams(window.location.search);
    const msg = params.get("msg");
    if(!msg) return;

    if(msg === "added") showToast("✅ Added successfully!", "success");
    else if(msg === "updated") showToast("✏️ Updated successfully!", "success");
    else if(msg === "deleted") showToast("🗑️ Deleted successfully!", "error");
}



window.addEventListener("DOMContentLoaded", checkMsgParam);
