import express from "express";
import cors from "cors";
import fs from "fs";

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(express.json());

// Endpoint utama
app.get("/", (req, res) => {
  try {
    const data = JSON.parse(fs.readFileSync("./data.json", "utf-8"));
    res.json(data);
  } catch (err) {
    res.status(500).json({ error: "Gagal memuat data" });
  }
});

// Jalankan server
app.listen(PORT, () => console.log(`✅ Server berjalan di port ${PORT}`));