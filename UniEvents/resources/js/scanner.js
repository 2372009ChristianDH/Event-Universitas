import { Html5Qrcode } from "html5-qrcode";

let scanner = new Html5Qrcode("reader");

function startScanner() {
    scanner.start(
        { facingMode: "environment" },
        {
            fps: 10,
            qrbox: 250
        },
        onScanSuccess,
        (error) => {
            console.warn("QR scan error:", error);
            document.getElementById('scan-result').innerText = "Gagal membaca QR.";
        }
    ).catch(err => {
        console.error("Failed to start scanner:", err);
        document.getElementById('scan-result').innerText = "Gagal memulai kamera: " + err;
    });
}

function onScanSuccess(decodedText, decodedResult) {
    fetch(`/scan/${decodedText}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('scan-result').innerText = data.message;
            addCheckinToTable(decodedText);
        })
        .catch(() => {
            document.getElementById('scan-result').innerText = "Gagal mencatat kehadiran.";
        });
}

function addCheckinToTable(id) {
    const now = new Date();
    const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    const tbody = document.getElementById('checkin-table-body');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${time}</td>
        <td>${id}</td>
        <td><span class="status-badge active">Checked In</span></td>
    `;
    tbody.prepend(row);
}

window.onload = startScanner;
