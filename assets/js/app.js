// assets/js/app.js

async function loadData() {
  try {
    const response = await fetch("http://localhost/sijadwal/api/jadwal_list.php");
    const data = await response.json();

    console.log("DATA DARI API:", data);

    const tbody = document.querySelector("#schedule tbody");
    tbody.innerHTML = "";

    if (!Array.isArray(data) || data.length === 0) {
      tbody.innerHTML = `<tr><td colspan="7">Belum ada data jadwal</td></tr>`;
      return;
    }

    data.forEach(item => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${item.course}</td>
        <td>${item.lecturer}</td>
        <td>${item.room}</td>
        <td>${item.class}</td>
        <td>${item.day}</td>
        <td>${item.start_time} - ${item.end_time}</td>
        <td>
          <a href="edit.html?id=${item.id}" class="btn-edit">✏️ Edit</a>
          <button class="btn-delete" data-id="${item.id}">🗑️ Hapus</button>
        </td>
      `;
      tbody.appendChild(tr);
    });

    // Tambah event listener buat tombol hapus
    document.querySelectorAll(".btn-delete").forEach(btn => {
      btn.addEventListener("click", async function() {
        const id = this.dataset.id;
        if (confirm("Yakin mau hapus jadwal ini?")) {
          try {
            const res = await fetch(`http://localhost/sijadwal/api/jadwal_delete.php?id=${id}`, {
              method: "GET"
            });
            const result = await res.json();
            if (result.success) {
              alert("✅ Jadwal berhasil dihapus!");
              loadData(); // refresh tabel
            } else {
              alert("❌ Gagal hapus: " + result.message);
            }
          } catch (err) {
            alert("⚠ Error: " + err);
          }
        }
      });
    });

  } catch (err) {
    console.error("Gagal load data:", err);
    document.querySelector("#schedule tbody").innerHTML =
      `<tr><td colspan="7">⚠️ Gagal memuat data</td></tr>`;
  }
}

loadData();
