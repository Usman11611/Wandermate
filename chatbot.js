document.getElementById("chatbot-form").addEventListener("submit", async (e) => {
    e.preventDefault(); // Prevent default form submission

    const userInput = document.getElementById("userInput").value;

    // Display user input in the chat window
    const chatbotMessages = document.getElementById("chatbot-messages");
    chatbotMessages.innerHTML += `<div class="message user-message"><strong>Me:</strong> ${userInput}</div>`;

    // Send the input to the backend
    try {
        const response = await fetch("chatbot.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ userInput: userInput }),
        });

        if (!response.ok) {
            throw new Error("Failed to fetch response from the server.");
        }

        const data = await response.json();

        // Display chatbot's response
        chatbotMessages.innerHTML += `<div class="message bot-message"><strong>Chatbot:</strong> ${data.response}</div>`;
    } catch (error) {
        chatbotMessages.innerHTML += `<div class="message bot-message"><strong>Chatbot:</strong> There was an error processing your request. Please try again later.</div>`;
        console.error("Error:", error);
    }

    // Clear the input field
    document.getElementById("userInput").value = "";

    // Scroll to the latest message
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
});
