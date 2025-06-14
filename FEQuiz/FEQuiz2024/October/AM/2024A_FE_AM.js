const quizData = [
    {
        question: "P, Q, and R are propositions. It is known that the truth value of proposition P is true, and the values of both the propositions “(not P) or Q” and “(not Q) or R” are true. Which of the following is a combination of the truth values of Q and R? Here, X or Y represents the logical sum of X and Y, and not X represents the negation of X.",
        options: ["a)", "b) ", "c) ", "d) "],
        image: "img/Q(3).png",
        answer: "d) "
    },
    {
        question: "What is the value of the postfix expression below? Here, A, B, C, and D are operands whose values are 4, 3, 5, and 6, respectively. Symbols “+”, “−”, “×”, and “÷” are arithmetic operators for addition, subtraction, multiplication, and division, respectively",
        options: ["a) −3", "b) 0", "c) 3", "d) 40/3"],
        image: "img/Q(2).png",
        answer: "b) 0"
    },
    {
        question: "Which of the following is the computational complexity of the Heapsort algorithm? Here, n is the number of elements to be sorted, and all comparisons, swaps, and other needed operations can proceed in constant time.",
        options: ["a) O (log n)", "b) O (n)", "c) O (n^2)", "d) O (n log n)"],
        answer: "d) O (n log n)"
    },
    {
        question: "The presence of an edge between nodes is represented by an adjacent matrix. When the adjacent matrix of an undirected graph is as below, which of the following is its graph representation? Here, the nodes correspond with the rows and columns of the adjacent matrix. If there is an edge between nodes, this is indicated with 1, and if there is no edge, this is indicated with 0.",
        options: [
            "img/Q(4)_a.png",
            "img/Q(4)_b.png",
            "img/Q(4)_c.png",
            "img/Q(4)_d.png"
        ],
        image: "img/Q(4).png",
        answer: "img/Q(4)_c.png"
    },
    {
        question: "Which of the following represents the post-order traversal of the tree below?",
        options: [
            "a) 11",
            "b) 20",
            "c) 27",
            "d) 45"
        ],
        image: "img/Q(5).png",
        answer: "b) 20",

    },
    {
        question: "The function f (n) is recursively defined in terms of the natural number n as below. Which of the following is the value of f (5)?",
        options: ["a) 6", "b) 9", "c) 15", "d) 25"],
        image: "img/Q(6).png",
        answer: "c) 15"
    },
    {
        question: "Which of the following is the appropriate description of the “selection sort” algorithm?",
        options: ["a) An intermediate reference value is determined, and then the elements are divided into two groups of “larger” values and “smaller” values. This operation is recursivelyrepeated.",
            "b) Each set of elements extracted at regular intervals is sorted, and then the interval is further decreased. The operation is repeatedly performed until the interval becomes 1.",
            "c) The element with the largest value is determined and swapped for the last element, and then the largest value of the unsorted elements is determined and swapped for the second-to-the-last element. This operation is repeated in the same way.",
            "d) Two adjacent elements are repeatedly compared and swapped if the first element is larger than the second. This operation is repeated until all elements are arranged in an orderly fashion."],
        answer: "c) The element with the largest value is determined and swapped for the last element, and then the largest value of the unsorted elements is determined and swapped for the second-to-the-last element. This operation is repeated in the same way."
    },
    {
        question: "What is the approximate performance of a CPU in MIPS, when the instruction mix of the CPU is shown in the table below? Here, the CPU does not use a pipeline architecture.",
        options: ["a) 0.03", "b) 0.41", "c) 2.44", "d) 35.00"],
        image: "img/Q(8).png",
        answer: "c) 2.44"
    },
    {
        question: "When the CPU needs data, it first accesses the cache memory. When the data is not available in the cache memory, the CPU accesses the main memory. If the miss ratio is 0.2 and the access times for cache memory and main memory are as shown below, what is the approximate average memory access time in ns for the CPU? Here, there are only cache memory and main memory for the CPU, the access time for main memory includes the time to confirm whether the data is available in cache memory, and the overhead time for the cache management can be ignored",
        options: ["a) 315 ", "b) 360", "c) 1,215", "d) 1,260"],
        image: "img/Q(9).png",
        answer: "b) 360"
    },
    {
        question: "Which of the following is the appropriate purpose of defragmentation of hard disks?",
        options: ["a) To access disk files faster and more efficiently", "b) To clean up temporary and junk files", "c) To delete IBG (interblock gap) and increase capacity", "d) To protect disk drives from physical failures"],
        answer: "a) To access disk files faster and more efficiently"
    },
    {
        question: "Which of the following is a fail-safe concept for improving the security and reliability of the information system?",
        options: ["a) Even when the user performs an incorrect operation, a problem does not occur in the system.",
            "b) Even when there is a partial system fault, the required functions of the overall system are maintained.",
            "c) When a device configuring the system fails, damage can be minimized by enabling the system to stop safely.",
            "d) When a system failure occurs, processing is continued by switching to a standby system."],
        answer: "c) When a device configuring the system fails, damage can be minimized by enabling the system to stop safely."
    },
    {
        question: "Which of the following is the approximate availability of the system comprising five devices, namely, A, B, C, D, and E as shown in the figure below? The numeric value in parentheses represents the availability of each device. The system is operational if either device connected in parallel is available.",
        options: ["a) 0.003", "b) 0.031", "c) 0.282", "d) 0.795"],
        image: "img/Q(12).png",
        answer: "d) 0.795"
    },
    {
        question: "There are minor and major page faults in an Operating System (OS). Which of the following is an appropriate action of the OS when a major page fault occurs?",
        options: ["a) Asking the user to input the instruction corresponding to the page",
            "b) Looking for a page in CPU cache",
            "c) Looking for a page in virtual memory on the hard disk",
            "d) Looking for the missed block corresponding to the page on the physical memory"],
        answer: "c) Looking for a page in virtual memory on the hard disk"
    },
    {
        question: "A real-time OS that performs preemptive priority scheduling for tasks A and B with A having a higher priority than B. Which of the following is the action that the OS takes?",
        options: ["a) When A is launched during the execution of B, B is put into a ready state and A is executed.",
            "b) When A is launched during the execution of B, B is put into a waiting state and A is executed.",
            "c) When B is launched during the execution of A, A is put into a ready state and B is executed.",
            "d) When B is launched during the execution of A, A is put into a waiting state and B is executed."],

        answer: "a) When A is launched during the execution of B, B is put into a ready state and A is executed."
    },
    {
        question: "",
        options: ["a)", "b) ", "c)", "d)"],
        image: "img/Q(15).png",
        answer: "b) "
    },
    {
        question: "",
        options: ["a)", "b)", "c)", "d)"],
        image: "img/Q(16).png",
        answer: "d)"
    },
    {
        question: "Audio signals are recorded using 8-bit samples at a sampling rate of 11,000 times per second. When a flash memory of 512 × 106 bytes is used, what is the maximum recording time of such data in minutes?",
        options: ["a) 77", "b) 96", "c) 775", "d) 969"],
        answer: "c) 775"
    },
    {
        question: "Which of the following is a database design that consists of multiple tables with rows and columns that are linked together through matching data stored in each table?",
        options: ["a) Hierarchical database", "b) Network database", "c) Object-oriented database", "d) Relational database"],
        answer: "d) Relational database"
    },
    {
        question: "",
        options: ["a) ", "b)", "c)", "d) "],
        image: "img/Q(19).png",
        answer: "b)"
    },
    {
        question: "",
        options: ["a) ", "b) ", "c) ", "d) "],
        image: "img/Q(20).png",
        answer: "b)"
    },
    {
        question: "If a transaction processing program ends abnormally while updating the database, the database is recovered by a rollback process. In these circumstances, which of the following is the information that is used?",

        options: ["a) Post-update information of log files", "b) Pre-update information of log files", "c) The latest backup file information", "d) The latest snapshot information"],
        answer: "b) Pre-update information of log files"
    },
    {
        question: "Which of the following is a property on a database that guarantees a result where a transaction either fully completes update processing or is revoked as if no processing took place at all?",
        options: ["a) Atomicity", "b) Consistency", "c) Durability", "d) Isolation"],
        answer: "a) Atomicity"
    },
    {
        question: "Which of the following is an appropriate description of a device that connects LANs?",
        options: ["a) A bridge relays frames based on IP addresses.",
            "b) A gateway converts the protocols of only the first through third levels in the OSI basic reference model",
            "c) A repeater extends the transmission distance by amplifying signals between segments of the same type.",
            "d) A router relays frames based on MAC addresses"],
        answer: "c) A repeater extends the transmission distance by amplifying signals between segments of the same type."
    },
    {
        question: " What is the broadcast address of the network 192.168.128.0/22?",
        options: ["a) 192.168.128.127", "b) 192.168.128.255", "c) 192.168.131.255", "d) 192.168.255.255"],
        answer: "c) 192.168.131.255"
    },
    {
        question: "Which of the following is a protocol to gather information on network components to manage and troubleshoot the network?",
        options: ["a) NTP", "b) SMTP", "c) SNMP", "d) TELNET"],
        answer: "c) SNMP"
    },
    {
        question: "Which of the following is the way of using a phone to supply an Internet connection to other devices, such as a tablet or laptop computer over either Wi-Fi or Bluetooth?",
        options: ["a) Dedicated mobile hotspots", "b) PPPoE", "c) Tethering", "d) UPnP"],
        answer: "c) Tethering"
    },
    {
        question: "Which of the following is an example of a phishing email?",
        options: ["a) An email containing pop-up ads for products unrelated to the email",
            "b) An email intercepted, altered, and successfully sent",
            "c) An email with a link that automatically installs an application collecting and sending data to the remote server",
            "d) An email with a link that redirects to a fake banking site"],
        answer: "d) An email with a link that redirects to a fake banking site"
    },
    {
        question: "Which of the following bitwise logical operation can be applied in stream cipher between a plain text and a keystream to produce a cipher text, and between a ciphertext and the keystream to recover the plaintext?",
        options: ["a) AND", "b) NAND", "c) OR", "d) XOR"],
        answer: "d) XOR"
    },
    {
        question: "Which of the following description is an appropriate use of asymmetric encryption to ensure the confidentiality of a message that a sender is going to send to a receiver?",
        options: ["a) The message is encrypted using a pre-shared secret key",
            "b) The message is encrypted using a private key of the sender.",
            "c) The message is encrypted using a public key of the receiver.",
            "d) The message is encrypted using a public key of the sender."],
        answer: "c) The message is encrypted using a public key of the receiver."
    },
    {
        question: "Which type of attack involves intercepting communication between sender and receiver?",
        options: ["a) Brute Force Attack", "b) Man-in-the-Middle Attack", "c) Phishing Attack", "d) Ransomware Attack"],
        answer: "b) Man-in-the-Middle Attack"
    },
    {
        question: "Which of the following refers to a technique that is used in a credential stuffing attack?",
        options: [
            "a) Focusing on the case where there are users that set a word from the dictionary as their password, selecting one (1) user ID as the target of the attack, and attempting to log in using words in the dictionary and their combinations as the password",
            "b) Focusing on the case where there are users that use the same user ID and password on multiple websites, and attempting to log in using a list of user IDs and passwords fraudulently acquired from other websites",
            "c) Selecting one (1) frequently used password, and attempting to log in by using user IDs of all possible combinations of characters",
            "d) Selecting one (1) user ID as the target of the attack on a website that has a low maximum number of characters for passwords, and attempting to log in by using the user ID and passwords of all possible combinations of characters"
        ],

        answer: "b) Focusing on the case where there are users that use the same user ID and password on multiple websites, and attempting to log in using a list of user IDs and passwords fraudulently acquired from other websites"
    },
    {
        question: " Which of the following is the name of an attack where manipulation is made to display a malicious website near the top of the results on a search website?",
        options: ["a) Cross-site scripting", "b) DNS cache poisoning)", "c) SEO poisoning", "d) Social engineering"],
        answer: "c) SEO poisoning"
    },
    {
        question: "Which of the following is a function of security information and event management (SIEM)?",
        options: ["a) The centralized control of a range of communication devices in a network, and the changing of network configuration and security settings",
            "b) The execution of a file in an isolated virtual environment, and the monitoring of communication to a C&C server and other behavior",
            "c) The general analysis of logs that are collected from a range of devices, and the support of analysis and action by an administrator",
            "d) The inspection of header information in packets, the identification of application programs that receive communication, and the control of communication"],
        answer: "c) The general analysis of logs that are collected from a range of devices, and the support of analysis and action by an administrator"
    },
    {
        question: "Which of the following is the UML behavioral diagram showing the behavior of a single object in response to triggers?",
        options: ["a) Activity diagram", "b) Sequence diagram", "c) State machine diagram", "d) Use case diagram"],
        answer: "c) State machine diagram"
    },
    {
        question: "In object-oriented programming, which of the following is abstraction?",

        options: ["a) Concealing implementation details and exposing only a simplified interface for interacting with objects",
            "b) Creating a subclass instance inheriting attributes and behaviors from its superclass",
            "c) Defining multiple methods with the same name but different parameters",
            "d)Redefining in the child class a method that is already provided by the superclass with the same name and parameters but a different implementation"],
        answer: "a) Concealing implementation details and exposing only a simplified interface for interacting with objects"
    },
    {
        question: "Which of the following is an appropriate description of “delegation” in object orientation?",
        options: ["a) A mechanism that creates one (1) new object using multiple objects as its parts",
            "b) A mechanism where a lower-level class inherits the attribute or operation of a higher-level class",
            "c) A mechanism where an application of an operation to a certain object automatically causes the application of that operation to related objects",
            "d) A mechanism where an operation to a certain object is internally requested to be performed by another object"],
        answer: "d) A mechanism where an operation to a certain object is internally requested to be performed by another object"
    },
    {
        question: "In unit testing, which of the following activities is part of white box testing?",
        options: ["a) Boundary value analysis", "b) Condition testing", "c) Equivalence partitioning", "d) Orthogonal array testing"],
        answer: "b) Condition testing"
    },
    {
        question: "Which of the following is the appropriate explanation of a stub or a driver used in a test?",
        options: ["a) A driver is a module that is called from the module to be tested",
            "b) A driver passes arguments and calls the module to be tested",
            "c) A stub is a module used to call the module to be tested",
            "d) A stub is used to display or print the values returned from the module to be tested"],
        answer: "b) A driver passes arguments and calls the module to be tested"
    },
    {
        question: "Scrum is an agile development method. In Scrum, which of the following is an event where each member of the development team talks in turn about topics such as “things I did yesterday,” “things I will do today,” and “obstacles,” and all members share the status of a project?",
        options: ["a) Daily Scrum", "b) Retrospective", "c) Sprint planning", "d) Sprint review"],
        answer: "a) Daily Scrum"
    },
    {
        question: "Among eXtreme Programming (XP) practices, which of the following is adopted to improve program quality in program development through smooth communication between programmers by exchanging their roles and reviewing each other’s work?",
        options: ["a) Coding standard", "b) Pair programming", "c) Planning game", "d) Test-driven development"],
        answer: "b) Pair programming"
    },
    {
        question: "Which of the following is an appropriate purpose for using a Work Breakdown Structure (WBS) in a software development project?",

        options: ["a) To clarify the sequence relation of activities and understand the critical path that should be intensively managed",
            "b) To hierarchically detail activities and segment them into a manageable scale",
            "c) To optimize the total cost when there is a trade-off between the duration and the cost of development",
            "d) To represent the schedule of an activity with a horizontal bar, and clarify the start time and end time of the activity as well as the progress at the present point in time"],
        answer: "b) To hierarchically detail activities and segment them into a manageable scale"
    },
    {
        question: "Which of the following is an appropriate explanation concerning the scope creep in project scope management?",

        options: ["a) A hierarchical decomposition of the total scope of work to be carried out by the project team to accomplish the project objectives and create the required deliverables",
            "b) Any change to the project scope, which almost consistently requires an adjustment to the project cost or schedule",
            "c) The sum of the products, services, and results to be provided as a project",
            "d) The uncontrolled expansion of product or project scope without adjustments to time, cost, and resources"],
        answer: "d) The uncontrolled expansion of product or project scope without adjustments to time, cost, and resources"
    },
    {
        question: "Which of the following is a requirement for service level management?",
        options: ["a) A capacity plan is created, implemented, and maintained while human, technical, informational, and financial resources are considered.",
            "b) A service catalog and SLA are created for the service to be provided, and they are agreed upon with the customer.",
            "c) Costs are monitored and reported against the budget; the financial forecasts are reviewed, and costs are managed.",
            "d) Risks to service continuity and availability of services are assessed and documented"],
        answer: "b) A service catalog and SLA are created for the service to be provided, and they are agreed upon with the customer."
    },
    {
        question: "A device that operates 24 hours a day, 360 days a year has an MTBF value of 1,440 hours. Which of the following is the average number of failures for this device for 360 days? Here, the result is rounded to the closest whole number, and the MTTR of the device is ignored.",
        options: ["a) 3",
            "b) 6",
            "c) 9",
            "d)12"],
        answer: "b) 6"
    },
    {
        question: "Which of the following is the most appropriate description of a system auditor?",
        options: ["a) The entire audit interview must be conducted by one (1) system auditor, because discrepancies may occur in the record if multiple auditors are involved.",
            "b) The system auditor must instruct the department being audited to implement improvement measures for deficiencies identified during the audit interview.",
            "c) The system auditor must make an effort to obtain documents and records that support the information obtained from the department being audited during the audit interview.",
            "d) The system auditor must select audit interviewees from administrators who have been an auditor within the department being audited."],
        answer: "c) The system auditor must make an effort to obtain documents and records that support the information obtained from the department being audited during the audit interview."
    },
    {
        question: "Which of the following is an explanation of an application architecture that constitutes enterprise architecture?",
        options: ["a) It systematically describes the business processes or the information flows necessary for the business strategy.",
            "b) It systematically describes the contents of the data necessary for business operations, the relations or structures between the data, etc.",
            "c) It systematically describes the functions or system configurations that support business processes.",
            "d) It systematically describes the technical components necessary for the developments and operations of the information systems."],
        answer: "c) It systematically describes the functions or system configurations that support business processes."
    },
    {
        question: "Which of the following is a description of the SOA?",
        options: ["a) A concept of constructing a system by considering the software functions as components called services and combining them",
            "b) A concept of improving sales efficiency and quality by using IT for sales activities to increase sales and profits as well as to improve customer satisfaction",
            "c) A concept of re-designing the business processes to innovatively improve the cost, quality, service, and speed",
            "d) Outsourcing the in-house operations that are not part of the core businesses to concentrate the management resources on the core businesses"],
        answer: "a) A concept of constructing a system by considering the software functions as components called services and combining them"
    },
    {
        question: "Which of the following is the work that is performed when non-functional requirements are defined?",
        options: ["a) Clarifying the flow of information (i.e., data) between the functions constituting business operations",
            "b) Clarifying the interface for exchanging information with other systems",
            "c) Creating the technical requirements for the development criteria and standards according to the programming language used in system development",
            "d) Defining the scope to be implemented as system functions"],
        answer: "c) Creating the technical requirements for the development criteria and standards according to the programming language used in system development"
    },
    {
        question: "Which of the following is an explanation of diversity management?",
        options: ["a) Both labor and management to reach an agreement on working conditions and work together with the aim of increasing profits",
            "b) For employees to harmonize between work and private life, approach their work with a sense of purpose, and increase the vitality of the organization",
            "c) For employees to take an autonomous approach to work with the aim of achieving the objectives that they set for themselves and be evaluated according to the degree of achievement",
            "d) To increase the vitality of the organization by respecting the diversity among its employees in terms of aspects such as gender, age, and nationality"],
        answer: "d) To increase the vitality of the organization by respecting the diversity among its employees in terms of aspects such as gender, age, and nationality"
    },
    {
        question: "In innovation theory, consumers are classified into five (5) groups innovators, early adopters, early majority, late majority, and laggards according to the timing of their purchase of a new product. Which of the following is the appropriate explanation of the early adopters?",
        options: ["a) A group that accepts a new product, service, or other such offering at an early phase, has a large impact on consumers, is sensitive to trends, and makes decisions after collecting information themselves",
            "b) A group that accepts a new product, service, or other such offering at the soonest phase without worrying about risks",
            "c) A group that is skeptical about the adoption of a new product or new technology and only adopts it after seeing it being adopted by most people around them",
            "d) A group that is the most conservative, has limited interest in movements in society and tends to adopt new trends only after they become common or, in some cases, remains firm in refusing their adoption)"],

        answer: "a) A group that accepts a new product, service, or other such offering at an early phase, has a large impact on consumers, is sensitive to trends, and makes decisions after collecting information themselves"
    },
    {
        question: "Which of the following is a definition of Customer Relationship Management (CRM)?",
        options: ["a) A framework used to support and integrate processes, people, and information across an organization to provide a unified gateway for information and a knowledge base for employees, partners, and customers",
            "b) A technology for managing all of a company’s relationships and interactions with customers and potential customers in order to improve business relationships",
            "c) A type of software that organizations use to manage day-to-day business activities such as accounting, procurement, project management, risk management and compliance, and supply chain operations",
            "d) The broad range of activities required to plan, control, and execute a product's flow, from acquiring raw materials and production through distribution to the final customer, in the most streamlined and cost-effective way possible"],
        answer: "b) A technology for managing all of a company’s relationships and interactions with customers and potential customers in order to improve business relationships"
    },
    {
        question: "Which of the following is an appropriate explanation of concurrent engineering?",
        options: ["a) A product development technique that sequentially executes processes, such as design, manufacturing, and sales activities",
            "b) A technique that analyzes a target system and clarifies its specifications",
            "c) A technique that executes processes, such as design and production planning, in parallel with product development",
            "d) A technique that grasps the optimal combination of functions and costs and improves value through systematic procedures."],
        answer: "c) A technique that executes processes, such as design and production planning, in parallel with product development"
    },
    {
        question: "Which of the following is one of the main characteristics of a blockchain?",
        options: ["a) A centralized ledger on a server", "b) A client-server network", "c) A distributed ledger on a peer-to-peer network", "d) A type of cryptocurrency"],
        answer: "c) A distributed ledger on a peer-to-peer network"
    },
    {
        question: "Which of the following is the situation where an improvement can be expected by installing a Material Requirements Planning (MRP) system?",
        options: ["a) Drawing information is managed on both electronic files and hard copies, so the history of design changes cannot be accurately traced.",
            "b) High-mix, low-volume production is adopted, so the cost of installing production equipment is increasing",
            "c) Information about materials and quantities necessary for production is complicated, so a miscalculation of order quantity or an interruption of production often occurs.",
            "d) There are too many design changes, so production efficiency does not improve."],
        answer: "d) 33,000"
    },
    {
        question: "Which of the following is the objects that can benefit from the cell production method?",
        options: ["a) Products that require a wide variety and flexible production",
            "b) Products that require division of labor by standardization, simplification, and specialization",
            "c) Products that require mass production to increase productivity",
            "d) Products whose specifications do not change for a long period"],
        answer: "a) Products that require a wide variety and flexible production"
    },
    {
        question: "Which of the following is a technique that can be used to discover useful information and relationships from large amounts of customer and market data retained by a company?",
        options: ["a) Data dictionary", "b) Data flow diagram", "c) Data mining", "d) Data warehouse"],
        answer: "c) Data mining"
    },
    {
        question: "",
        image: "img/Q(57).png",
        options: ["a) ", "b) ", "c) ", "d) "],
        answer: "b) "
    },
    {
        question: "",
        image: "img/Q(58).png",
        options: ["a) 50", "b) 60", "c) 70", "d) 80"],
        answer: "c) 70"
    },
    {
        question: "When the selling price of a product is $50 and the fixed costs for production and sales are $100,000, which of the following is the number of units to be sold to achieve the desired profit of $50,000? Here, the variable cost ratio is 60%.",

        options: ["a) 5,000", "b) 7,500", "c) 10,000", "d) 12,500"],
        answer: "b) 7,500"
    },
    {
        question: "Which of the following is an explanation of a volume license agreement?",
        options: ["a) A contract that establishes standard license conditions and deems that a license agreement is automatically established between the rightsholder and the purchaser when a certain amount of package is unwrapped within the scope of the standard license conditions.",
            "b) A contract that predefines the number of installations and permits the use of software for companies or other such purchasers of large amounts of software",
            "c) A contract that restricts the location of use and permits the use of an unlimited number of units or persons within a specific facility",
            "d) A contract where use is permitted by selecting to agree to the terms of the contract on the screen that is displayed when software is downloaded from the Internet"],
        answer: "b) A contract that predefines the number of installations and permits the use of software for companies or other such purchasers of large amounts of software"
    },
];


const quizContainer = document.getElementById("quiz-container");
const paginationContainer = document.getElementById("pagination");
const prevButton = document.getElementById("prev-button");
const nextButton = document.getElementById("next-button");
const submitButton = document.getElementById("submit");
const click = document.getElementById("click");
const a_num = document.getElementById("aq-num");
const ua_num = document.getElementById("uq-num");
const pgiNextBtn = document.getElementById("pgi-nextBtn");
const pgiLeftBtn = document.getElementById("pgi-leftBtn");

let userSelections = {};

let score = 0;
const questionsPerPage = 6;
let currentPage = 0;
const maxVisiblePages = 8;
const totalPages = Math.ceil(quizData.length / questionsPerPage);


for (const i in quizData) {
    if (userSelections[i] === undefined) {
        userSelections[i] = null; // Initialize unanswered questions
    }
}

// Helper to get URL parameter
function getURLParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Check if Random Quiz is enabled
const enableRandomQuiz = getURLParameter("enableRandomQuiz") === "1";

if (enableRandomQuiz) {
    // Fisher-Yates Shuffle 
    for (let i = quizData.length - 1; i > 0; i--) {
        const randomIndex = Math.floor(Math.random() * (i + 1)); // Generate a random index
        // Swap the elements at i and randomIndex
        [quizData[i], quizData[randomIndex]] = [quizData[randomIndex], quizData[i]];
    }
}

// Function to render questions for the current page
function renderQuestions(pageIndex) {
    quizContainer.innerHTML = ""; // Clear previous questions

    const start = pageIndex * questionsPerPage;
    const end = Math.min(start + questionsPerPage, quizData.length);
    const questionsToDisplay = quizData.slice(start, end);

    questionsToDisplay.forEach((q, index) => {
        const questionDiv = document.createElement("div");
        questionDiv.classList.add("question-block");
        questionDiv.id = `question-${start + index + 1}`; // Add unique id to each question div

        // Add question text
        const questionText = document.createElement("h3");
        questionText.innerHTML = `<strong>Q${start + index + 1}.</strong> ${q.question}`;
        questionDiv.appendChild(questionText);

        if (q.image) {
            const questionImage = document.createElement("img");
            questionImage.src = q.image;
            questionImage.alt = "Question image";
            questionImage.style.maxWidth = "100%"; // Style the image for better fit
            questionDiv.appendChild(questionImage);
        }

        // Add options
        q.options.forEach(option => {
            const label = document.createElement("label");
            label.className = "select-answer"
            label.style.display = "block";

            const input = document.createElement("input");
            input.type = "radio";
            input.name = `question${start + index}`;
            input.value = option;

            // Pre-select if user previously chose this option
            if (userSelections[start + index] === option) {
                input.checked = true;
            }

            input.addEventListener("change", () => {
                userSelections[start + index] = option; // Update user's selection
            });

            if (option.endsWith(".png") || option.endsWith(".jpg")) {
                const optionImage = document.createElement("img");
                optionImage.src = option;
                optionImage.alt = "Option image";
                optionImage.style.maxWidth = "70%";
                label.appendChild(input);
                label.appendChild(optionImage);
            } else {
                label.appendChild(input);
                label.append(option);
            }

            questionDiv.appendChild(label);
        });

        quizContainer.appendChild(questionDiv);
    });
}

// Function to render pagination links
function renderPagination() {
    paginationContainer.innerHTML = ""; // Clear previous pagination links

    const totalPages = Math.ceil(quizData.length / questionsPerPage);
    const startPage = Math.floor(currentPage / maxVisiblePages) * maxVisiblePages;
    const endPage = Math.min(startPage + maxVisiblePages, totalPages);

    for (let i = startPage; i < endPage; i++) {
        const pageLink = document.createElement("a");
        pageLink.innerText = i + 1;
        pageLink.href = "#";
        pageLink.classList.add("page-link");
        if (i === currentPage) pageLink.classList.add("active");

        if ((currentPage + 1) * questionsPerPage >= quizData.length) {
            submitButton.style.display = "block"; // Show submit button on the last page
        } else {
            submitButton.style.display = "block"; // Hide submit button otherwise
        }

        // Add click listener for pagination
        pageLink.onclick = (e) => {
            e.preventDefault(); // Prevent full reload
            currentPage = i;
            updatePaginationAndQuestions();
            // Scroll to the top of the page
            scrollToTop();
        };

        paginationContainer.appendChild(pageLink);
    }
    pgiLeftBtn.classList.toggle("disabled", startPage === 0);
    pgiNextBtn.classList.toggle("disabled", endPage >= totalPages);
}
// Event listeners for group navigation buttons
document.getElementById("pgi-nextBtn").onclick = (e) => {
    e.preventDefault();
    e.stopPropagation();
    const startPage = Math.floor(currentPage / maxVisiblePages) * maxVisiblePages;
    const endPage = Math.min(startPage + maxVisiblePages, totalPages);

    if (endPage < totalPages) {
        currentPage = endPage; // Move to the first page of the next group
        updatePaginationAndQuestions();
    }
};

document.getElementById("pgi-leftBtn").onclick = (e) => {
    e.preventDefault();
    e.stopPropagation(); // Prevent bubbling in case of other listeners
    const startPage = Math.floor(currentPage / maxVisiblePages) * maxVisiblePages;

    if (startPage > 0) {
        currentPage = startPage - maxVisiblePages; // Move to the first page of the previous group
        updatePaginationAndQuestions();
    }
    window.scrollTo({
        top: document.documentElement.scrollHeight, // Keep the current scroll position
        behavior: "instant", // No scrolling animation
    });
};
document.getElementById("pgi-nextBtn").onclick = (e) => {
    e.preventDefault();
    e.stopPropagation();

    const startPage = Math.floor(currentPage / maxVisiblePages) * maxVisiblePages;
    const endPage = Math.min(startPage + maxVisiblePages, totalPages);

    if (endPage < totalPages) {
        currentPage = endPage;
        updatePaginationAndQuestions();
    }

    window.scrollTo({
        top: document.documentElement.scrollHeight,
        behavior: "instant",
    });
};
// Function to scroll to the top of the page
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth", // Smooth scrolling
    });
}

// Function to update questions and pagination state
function updatePaginationAndQuestions() {
    renderQuestions(currentPage);
    renderPagination();

    prevButton.classList.toggle("disabled", currentPage === 0);
    nextButton.classList.toggle(
        "disabled",
        currentPage === Math.ceil(quizData.length / questionsPerPage) - 1
    );
}


// Track the currently active question

click.onclick = (e) => {
    const ua_num = document.getElementById("uq-num");
    const a_num = document.getElementById("aq-num");
    let activeQuestionIndex = null; // Initialize active question index

    ua_num.innerHTML = ""; // Clear previous content
    a_num.innerHTML = ""; // Clear previous content

    for (const i in userSelections) {
        const questionNum = parseInt(i) + 1; // Question numbers are 1-based
        const unAnswered = userSelections[i] === null; // Check if unanswered
        const boxClass = unAnswered ? "unanswered" : "answered";
        const isActive = parseInt(i) === activeQuestionIndex; // Check if this question is active

        const boxHTML = `
            <a style="display:contents" onclick="setActiveState(${i})">
                <div class="border border-2 border-info rounded shadow d-flex align-items-center justify-content-center ${boxClass} question-link ${isActive ? "active" : ""
            }"
                    style="
                        flex: 1 1 calc(33.33% - 50px); 
                        aspect-ratio: 1 / 1; 
                        min-width: 40px; 
                        max-width: 60px; 
                        background-color: #f8f9fa;
                        font-size: 0.8rem;
                        text-align: center;
                        cursor: pointer;
                        transition: background-color 0.3s ease;
                    ">
                    <strong>Q${questionNum}</strong>
                </div>
            </a>`;

        if (unAnswered) {
            // Add to Unanswered questions
            ua_num.innerHTML += boxHTML;
        } else {
            // Add to Answered questions
            a_num.innerHTML += boxHTML;
        }
    }
};

// Function to handle setting the active state
function setActiveState(index) {
    activeQuestionIndex = parseInt(index); // Update the active index globally
    updateActiveState(); // Update the active state in the DOM
    navigateToQuestion(index); // Navigate to the clicked question
}

// Function to update the active state in the DOM
function updateActiveState() {
    // Get all question links in the sidebar
    const allQuestionElements = document.querySelectorAll("#uq-num a div, #aq-num a div");

    allQuestionElements.forEach((element) => {
        const questionNumber = parseInt(element.textContent.replace("Q", "")) - 1; // Extract question number from text

        // Update active state based on activeQuestionIndex
        if (questionNumber === activeQuestionIndex) {
            element.classList.add("active"); // Add active class
        } else {
            element.classList.remove("active"); // Remove active class
        }
    });
}

function navigateToQuestion(questionIndex) {
    const pageIndex = Math.floor(questionIndex / questionsPerPage); // Determine the page containing the question
    // If the target question is not on the current page, update the page
    if (pageIndex !== currentPage) {
        currentPage = pageIndex;
        updatePaginationAndQuestions(); // Render the correct page
    }

    // Delay to ensure the correct page is rendered before scrolling
    setTimeout(() => {
        const questionId = `question-${parseInt(questionIndex) + 1}`; // +1 because IDs start from 1
        const questionElement = document.getElementById(questionId);
        const navHeight = document.querySelector("nav").offsetHeight; // Get the navigation bar's height

        if (questionElement) {
            // Calculate the position to scroll to, adjusting for the nav height
            const questionPosition = questionElement.getBoundingClientRect().top + window.scrollY - navHeight;

            // Scroll to the adjusted position
            window.scrollTo({
                top: questionPosition,
                behavior: "smooth", // Smooth scrolling
            });
        }
    }, 100); // Adjust delay if necessary for rendering to complete
}

// Event listener for question links
document.querySelectorAll("#uq-num a, #aq-num a").forEach((link, index) => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        setActiveState(index);
    });
});


// Initial call to render the first page and pagination
updatePaginationAndQuestions();

// Previous button click
prevButton.onclick = (e) => {
    e.preventDefault();
    e.stopPropagation();
    if (currentPage > 0) {
        currentPage--;
        updatePaginationAndQuestions();
        scrollToTop();
    }
};

// Next button click
nextButton.onclick = (e) => {
    e.preventDefault();
    const totalPages = Math.ceil(quizData.length / questionsPerPage);
    if (currentPage < totalPages - 1) {
        currentPage++;
        updatePaginationAndQuestions();
        scrollToTop();
    }
};

// Submit button click
submitButton.onclick = () => {
    // Reset score
    let score = 0;
    let results = []; // Array to store detailed results

    // Calculate the score and collect results
    // Iterate through all questions in the quiz data
    quizData.forEach((questionData, questionIndex) => {
        const selectedOption = userSelections[questionIndex]; // Get the user's selected option
        const isAnswered = selectedOption !== undefined; // Check if the question was answered
        const isCorrect = isAnswered && questionData.answer === selectedOption; // Check if the answer is correct

        // Update score if the answer is correct
        if (isCorrect) {
            score++;
        }

        // Collect results for all questions
        results.push({
            questionNumber: questionIndex + 1,  // Add question number
            question: questionData.question,
            userAnswer: isAnswered ? selectedOption : "Unanswered",
            correctAnswer: questionData.answer,
            status: isAnswered ? (isCorrect ? "correct" : "incorrect") : "unanswered",
            image: questionData.image || null,
        });
    });

    //data to result.php
    const data = { score };
    // Send data to the server using fetch
    fetch('results.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data), // Convert data to JSON
    })
        .then(response => response.text()) // Handle the response as text
        .then(result => {
            console.log('Response from PHP:', result);
            //    alert(`Server response: ${result}`);
        })
        .catch(error => {
            console.error('Error:', error);
        });


    // Pass data to the results page
    const resultsPage = "results.php";

    // Save results in local storage
    localStorage.setItem("quizResults", JSON.stringify(results));

    // Pass only essential data in the query string
    const params = new URLSearchParams({
        totalScore: score,
        totalQuestions: quizData.length,
    });
    window.location.href = `${resultsPage}?${params.toString()}`;

};

// unanswered tooltips
document.addEventListener("DOMContentLoaded", () => {
    // Get the sidebar element and the tooltip trigger element
    const offcanvasElement = document.getElementById("offcanvasWithBothOptions");
    const tooltipTrigger = document.getElementById("click");

    // Initialize tooltip manually
    let tooltipInstance = new bootstrap.Tooltip(tooltipTrigger, {
        placement: 'bottom', // Tooltip placement
    });

    // Add event listener for when the sidebar is hidden
    offcanvasElement.addEventListener("hidden.bs.offcanvas", () => {
        // Dispose the tooltip completely to reset its state
        if (tooltipInstance) {
            tooltipInstance.dispose();
            tooltipInstance = null;
        }
    });

    // Reinitialize the tooltip when the element is hovered again
    tooltipTrigger.addEventListener('mouseenter', () => {
        // Reinitialize the tooltip if it's disposed
        if (!tooltipInstance) {
            tooltipInstance = new bootstrap.Tooltip(tooltipTrigger, {
                placement: 'bottom',
            });
        }
        // Show the tooltip immediately on hover
        tooltipInstance.show();
    });
});

// scroll bar disappear
document.addEventListener("DOMContentLoaded", () => {
    const offcanvasElement = document.getElementById("offcanvasWithBothOptions");


    // Handle the sidebar open and close for scrollbar control
    offcanvasElement.addEventListener("show.bs.offcanvas", () => {
        document.body.style.overflow = "hidden"; // Hide the scrollbar when sidebar is shown
    });

    offcanvasElement.addEventListener("hidden.bs.offcanvas", () => {
        document.body.style.overflow = ""; // Reset overflow property when sidebar is hidden
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const timerDisplay = document.getElementById("timer"); // Timer element
    const timesUpModal = new bootstrap.Modal(document.getElementById("timesUpModal")); // Modal for Time's Up
    const timeLeftDisplay = document.getElementById("time-left"); // Countdown display inside modal-footer
    let totalSeconds = 1.5 * 60 * 60; //timer duration
    let countdownInterval; // Variable for countdown interval
    let countdownStarted = false;

    // Retrieve the enableTimer parameter from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const enableTimer = urlParams.get('enableTimer');

    // Function to update the timer display
    function updateTimerDisplay() {
        const hours = Math.floor(totalSeconds / 3600);
        const minutes = Math.floor((totalSeconds % 3600) / 60);
        const seconds = totalSeconds % 60;

        // Update the timer element
        timerDisplay.textContent = `${hours.toString().padStart(2, "0")}:${minutes
            .toString()
            .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
    }

    // Function to trigger the red color and twinkle effect
    function triggerRedEffect() {
        timerDisplay.style.color = "red"; // Change the timer color to red
    }
    // Function to trigger the red color and twinkle effect
    function triggerRedTwinkleEffect() {
        timerDisplay.style.color = "red"; // Change the timer color to red
        timerDisplay.classList.add("twinkle"); // Add twinkle class
    }

    // Start the timer
    function startTimer() {
        const timerInterval = setInterval(() => {
            if (totalSeconds > 0) {
                totalSeconds--;
                updateTimerDisplay();
                if (totalSeconds === 900) {
                    triggerRedEffect();
                } else if (totalSeconds === 300) {
                    triggerRedTwinkleEffect();
                }
            } else {
                clearInterval(timerInterval); // Stop the timer
                timesUpModal.show(); // Show "Time's up" modal
                startCountdownBeforeSubmit(); // Start the countdown before submission
            }
        }, 1000); // Update every second
    }

    // Countdown logic for Time's Up modal
    function startCountdownBeforeSubmit() {
        let countdown = 5;
        timeLeftDisplay.textContent = `In ${countdown} seconds, your score will be calculated`;

        countdownInterval = setInterval(() => {
            countdown--;
            timeLeftDisplay.textContent = `In ${countdown} seconds, your score will be calculated`;

            if (countdown <= 0) {
                clearInterval(countdownInterval); // Clear interval
                submitButton.click(); // Automatically submit quiz after countdown
            }
        }, 1000);
    }
    // Check if timer should be enabled based on the URL parameter
    if (enableTimer === "1") {
        // Show the timer and start it if enabled
        timerDisplay.style.display = "block"; // Make the timer visible
        updateTimerDisplay(); // Update the timer display initially
        startTimer(); // Start the timer countdown
    } else {
        // Hide the timer if not enabled
        timerDisplay.style.display = "none"; // Hide the timer
        countdownStarted = false;
    }
});

//modal box to leave from the exam page
document.addEventListener("DOMContentLoaded", () => {
    const leavePageModal = new bootstrap.Modal(document.getElementById("leavePageModal"));
    const confirmLeaveButton = document.getElementById("confirmLeaveButton");

    // Event listener for nav links
    document.querySelectorAll("a[data-target-link]").forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault(); // Prevent default navigation
            const targetLink = link.getAttribute("data-target-link"); // Get target link

            // Set the confirmation button's href
            confirmLeaveButton.setAttribute("href", targetLink);

            // Show the confirmation modal
            leavePageModal.show();
        });
    });
});





