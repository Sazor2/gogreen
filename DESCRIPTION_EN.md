# 🌿 Green School Tracker
### School Greening Program Tracker Web Application
**SMK Karya Bangsa Sintang** | Built with Laravel 12 + Filament v5

---

## 📌 About the Application

**Green School Tracker** is a web application designed to support the greening and environmental management program at SMK Karya Bangsa Sintang, West Kalimantan. The application helps the school monitor plant growth, manage information about regional native trees, and educate students about waste recycling through a waste bank calculator feature.

This application is built without a database dependency, making it extremely lightweight, easy to run, and suitable for use as a learning tool or live demonstration.

---

## 🎯 Objectives

- Support the **Go Green** program within the school environment
- Record and preserve **native Kalimantan trees** on the school grounds
- Educate students about **waste management** and the waste bank points system
- Serve as an example of a modern yet simple and functional web application

---

## 🚀 Key Features

### 1. 📊 Go Green Dashboard
The main page displaying a summary of the school's greening program statistics, including:
- Total number of trees planted
- Total greening area
- Number of plant species
- Overall plant health status

### 2. 🌳 Plant Management
Displays a complete list of native Kalimantan trees on the school grounds, with information on:
- Local name and Latin (scientific) name
- Plant type / family
- Planting location within the school
- Ecological and economic benefits
- Estimated tree height
- Plant health status

**5 Registered Native Sintang Trees:**
| Name | Latin Name | Highlight |
|---|---|---|
| Tengkawang | *Shorea stenoptera* | Vegetable oil producer |
| Jelutung | *Dyera costulata* | Highest carbon absorber |
| Meranti Merah | *Shorea lepidota* | Premium construction timber |
| Rambutan Hutan | *Nephelium lappaceum* | Fruit & wildlife habitat |
| Ulin (Ironwood) | *Eusideroxylon zwageri* | Rarest tree in Kalimantan |

### 3. ♻️ Waste Bank Calculator
A point calculation tool for the school's waste bank program. Users enter the type and weight of waste, and the system calculates the points earned based on the following value table:

| Waste Type | Points per Kg |
|---|---|
| Plastic | 50 points |
| Paper | 30 points |
| Metal | 80 points |
| Glass | 40 points |
| Organic | 20 points |
| Electronic | 100 points |

---

## 🛠️ Technologies Used

| Component | Technology |
|---|---|
| Backend Framework | Laravel 12 |
| Admin Panel | Filament v5 |
| Reactive Frontend | Livewire 3 |
| Styling | Tailwind CSS |
| Programming Language | PHP 8.2+ |
| Data Storage | PHP Array (no database) |
| Session & Cache | File System |

---

## ⚙️ How to Run

```bash
# 1. Install dependencies
composer install
npm install

# 2. Build frontend assets
npm run build

# 3. Start the server
php artisan serve
```

> **Note:** No need to run `php artisan migrate` as this application does not use a database.

If using **Laravel Herd**, access directly via:
```
http://gogreen.test
```

### Page URLs:
| Page | URL |
|---|---|
| Home / Landing Page | `/` |
| Go Green Dashboard | `/admin` |
| Plant Management | `/admin/informasi-tanaman` |
| Waste Bank Calculator | `/admin/kalkulator-bank-sampah` |

---

## 🏫 About the School

This application was developed for **SMK Karya Bangsa Sintang**, a vocational high school committed to environmental preservation and ecology-based education in Sintang, West Kalimantan.

---

*🌿 Together protecting the environment, together building the future.*
