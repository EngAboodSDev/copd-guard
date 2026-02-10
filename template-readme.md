
#  🕋 Aoun - Hajj & Umrah Helper Platform  | منصة عون لمساعدة الحجاج والمعتمرين 
![logo](/docs/screenshots/main-image.png)

A web platform designed to assist pilgrims Hajj and Umrah performers with comprehensive guides, volunteer support, and translation services. The platform connects pilgrims with multilingual volunteers and provides step-by-step ritual instructions in Arabic.

---

## Table of Contents

- 📊 [ Overview](#overview)
- 🚀 [ Key Features](#key-features)
- 🛠️ [ Tech Stack Used](#tech-stack-used)
- 🗂 [ Project Structure](#project-structure)
- 🖥️ [ Project Requirements](#project-requirements)
- ⚡ [ Quick Installation](#quick-installation)
- 🔧 [ Configuration](#configuration)
- 🗄 [ Database Setup](#database-setup)
- ▶️ [ Usage](#usage)
- 📸 [ Screenshots](#screenshots)
- 🤝 [ Contributing](#contributing)
- 📄 [ License](#license)
- 🏷️ [ Credits](#credits)
- 📞 [ Support and Assistance](#support-and-assistance)

---

<h2 id="overview">📊 Overview</h2>

**عون (Aoun)** means "Help" or "Support" in Arabic. This platform serves as a digital companion for Muslims performing Hajj or Umrah by providing:

- **Detailed ritual guides** for Hajj and Umrah with step-by-step instructions
- **Volunteer matching** — pilgrims can find volunteers who speak their language
- **Real-time translation** — translate text between 50+ languages
- **News updates** — latest Hajj and Umrah news from Saudi Arabia
- **FAQ section** — answers to common questions about rituals and procedures

The interface is fully in **Arabic** with RTL (right-to-left) layout, catering to the primary audience of pilgrims and volunteers.

---

<h2 id="key-features">🚀 Key Features</h2>

### ✔️ Authentication
- **Login** — Username and password authentication
- **Registration** — Sign up as pilgrim (Hajj/Umrah) or volunteer
- **Language selection** — Volunteers can specify languages they speak (Arabic, Bengali, English, German, etc.)
- **Session management** — Cookie-based sessions for authenticated users

### ✔️ Hajj and Umrah Guide (`hajj.php`, `umrah.php`) 
- Complete guide to Hajj and Umrah rituals
- Illustrated steps with images
- Covers all mandatory rites and procedures


### ✔️ Volunteer Connection (`volunteers.php`)
- Browse volunteers by language
- Filter volunteers by spoken language
- Direct WhatsApp contact links
- Display of volunteer languages, email, and contact info

### ✔️ Translation (`translate.php`)
- Multi-language text translation
- 50+ languages supported via MyMemory API
- Text-to-speech (TTS) for pronunciation
- Copy to clipboard
- Swap source and target languages

### ✔️ News (`news.php`)
- Latest Hajj and Umrah news
- Links to external news sources
- Card-based layout with images

### ✔️ FAQ (`FAQ.php`)
- Accordion-style FAQ section
- Topics: differences between Hajj and Umrah, rituals, legal rulings, proxy performance, health procedures

---

<h2 id="tech-stack-used">🛠️ Tech-Stack Used</h2>

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) 
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) 
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) 
![Markdown](https://img.shields.io/badge/markdown-%23000000.svg?style=for-the-badge&logo=markdown&logoColor=white) 
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap 5](https://img.shields.io/badge/bootstrap_5-%237952B3.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![jQuery](https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white)
![Choices.js](https://img.shields.io/badge/choices.js-%23404d59.svg?style=for-the-badge&logo=javascript&logoColor=white)
![Font Awesome](https://img.shields.io/badge/font_awesome-%23339AF0.svg?style=for-the-badge&logo=fontawesome&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300758F.svg?style=for-the-badge&logo=mysql&logoColor=white)
![MariaDB](https://img.shields.io/badge/mariadb-%23003545.svg?style=for-the-badge&logo=mariadb&logoColor=white)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)
![XAMPP](https://img.shields.io/badge/xampp-%23FB7A24.svg?style=for-the-badge&logo=xampp&logoColor=white)
![MyMemory API](https://img.shields.io/badge/MyMemory_Translation_API-%23007ACC.svg?style=for-the-badge&logo=googletranslate&logoColor=white)

---

<h2 id="project-structure">🗂 Project Structure</h2>

```
📁 Aoun/
├── index.php          # Login & registration page
├── home.php           # Homepage (requires auth)
├── hajj.php           # Hajj ritual guide
├── umrah.php          # Umrah ritual guide
├── volunteers.php     # Volunteer contact / matching
├── translate.php      # Translation tool
├── news.php           # Hajj & Umrah news
├── FAQ.php            # Frequently asked questions
├── dbcon.php          # Database connection
├── 📁 css/
│   ├── style.css      # Main styles
│   └── trans_style.css # Translation page styles
├── 📁 js/
│   ├── script.js      # Login form toggle, Choices.js init
│   ├── languages.js   # Language list for registration
│   ├── countries.js   # Language codes for translation
│   └── trans_script.js # Translation logic
├── 📁 images/         # Images (Hajj, Umrah, news, user avatar)
├── 📁 database/
│   └── aoun.sql       # Alternative Database schema with sample data
└── README.md
```

---

<h2 id="project-requirements">🖥️ Project Requirements</h2>

- **Operating System:** Windows 10+, macOS Monterey+, or any Linux distro  
- **Web Browser:** Chrome / Firefox / Edge (latest versions)  
- **📋Runtime & Tools:**  
  - ***PHP*** 7.4 or higher (8.x recommended)
  - ***MySQL*** 5.7+ or ***MariaDB*** 10.4+
  - ***Apache*** (or compatible web server)
  - ***XAMPP*** (or similar local stack)

---

<h2 id="quick-installation">⚡ Quick Installation</h2>

1. **Clone the Repository** 
     ```bash
     git clone <repository-url>
     cd aoun
     ```

2. **Copy the Project into your web server directory**
   ```
   c:\xampp\htdocs\aoun\
   ```

3. **Start XAMPP** and ensure Apache and MySQL are running.

4. **Import the database** (see [Database Setup](#database-setup)).

5. **Configure** `dbcon.php` with your database credentials (see [Configuration](#configuration)).

6. **Access the application** in your browser:
   ```
   http://localhost/aoun/
   ```

---

<h2 id="configuration">🔧 Configuration</h2>

### Database Connection (`dbcon.php`)

Edit `dbcon.php` to match your environment:

```php
$con = mysqli_connect("localhost", "root", "", "aoun", "3308");
```

| Parameter | Description |
|-----------|-------------|
| Host | `localhost` (or your DB host) |
| Username | `root` (or your MySQL user) |
| Password | `""` (or your MySQL password) |
| Database | `aoun` |
| Port | `3308` (default MySQL is 3306) |


### Translation API

The translation feature uses the free **MyMemory API**:
- URL: `https://api.mymemory.translated.net/get`
- No API key required for basic usage
- Rate limits may apply for heavy use

---

<h2 id="database-setup">🗄 Database Setup</h2>

1. Open **phpMyAdmin** or MySQL CLI.

2. Create the database and import the schema:
   ```sql
   -- Run the contents of database/aoun.sql
   ```

3. **Tables:**
   - **`users`** — id, username, email, phone, password, isVolunteer
   - **`users_language`** — id, language, user_id (foreign key to users)
   - **`contacts`** — id, name, email, message

4. Sample data is included in `aoun.sql` for testing.

---

<h2 id="usage">▶️ Usage</h2>

### For Pilgrims (Hajj/Umrah)
1. Register or log in.
2. Browse **Hajj** or **Umrah** guides for ritual instructions.
3. Use **Translate** to convert text between languages.
4. Go to **التواصل مع المتطوعين** (Contact Volunteers) to find volunteers by language.
5. Click **التواصل عبر الواتساب** to open WhatsApp and contact a volunteer.

### For Volunteers
1. Register and select **مــتـطـــوع** (Volunteer).
2. Choose the languages you speak during registration.
3. Pilgrims can find and contact you via the volunteer page.

### Translation
- Enter text in the source language.
- Select source and target languages.
- Click **Translate Text**.
- Use the speaker icon for TTS or the copy icon to copy the result.

---

<h2 id="screenshots">📸 Screenshots</h2>

<details>
  <summary>Login and Register Page</summary>

![Desktop Home](docs/screenshots/Aoun-Login-TB.png)
![Desktop Home](docs/screenshots/Aoun-Register-DT.png)
</details>

<details>
  <summary>Home Page</summary>

![Desktop Home](docs/screenshots/Aoun-Home-DT.png)
</details>

<details>
  <summary>Hajj and Umrah Pages</summary>

![Desktop About](docs/screenshots/Aoun-Hajj-DT.png)
![Desktop About](docs/screenshots/Aoun-Umrah-DT.png)
</details>

<details>
  <summary>Volunteers Page</summary>

![Desktop About](docs/screenshots/Aoun-Volunteers-DT.png)
</details>

<details>
  <summary>Translate Page</summary>

![Desktop About](docs/screenshots/Aoun-Translate-DT.png)
</details>

<details>
  <summary>News Page</summary>

![Desktop About](docs/screenshots/Aoun-News-DT.png)
</details>

<details>
  <summary>FAQ Page</summary>

![Desktop About](docs/screenshots/Aoun-FAQ-DT.png)
</details>


[See All Screenshots...](/docs/screenshots/)

---

<h2 id="contributing">🤝 Contributing</h2>

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

<h2 id="license">📄 License</h2>

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

<h2 id="credits">🏷️ Credits</h2>

- **Bootstrap** — [getbootstrap.com](https://getbootstrap.com)
- **Font Awesome** — [fontawesome.com](https://fontawesome.com)
- **Choices.js** — [github.com/bbbootstrap](https://github.com/bbbootstrap/libraries)
- **MyMemory** — [mymemory.translated.net](https://mymemory.translated.net)
- **Tajawal Google Font** — [fonts.google.com](https://fonts.google.com/)

---

<h2 id="support-and-assistance">📞 Support and Assistance</h2>

### Getting Help
- **README.md**: For basic instructions
- **GitHub Issues**: Create an issue in the repository

### Contact Information
- **Developer**: Abdulrahman Fadhl Ameer Saif `@EngAboodSDev`
- **Email**: abdulrahmanfadhl@gmail.com
- **LinkedIn**: [Abdulrahman Fadhl](https://www.linkedin.com/in/engaboodsdev/)
- **Repository**: [GitHub Repository](https://github.com/EngAboodSDev/aoun)

---