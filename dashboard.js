document.addEventListener("DOMContentLoaded", function() {
    let tasksCompleted = 3;
    const taskButton = document.getElementById("complete-task-btn");
    const taskCount = document.getElementById("task-count");

    taskButton.addEventListener("click", function() {
        if (tasksCompleted < 5) {
            tasksCompleted++;
            taskCount.innerText = `${tasksCompleted}/5`;
            alert("Task completed! Your earnings have been updated.");
        } else {
            alert("You have completed all tasks for today!");
        }
    });
});
