# ✅ Simple Deployment Checklist

**Target Site**: https://saurabh-php-auth.infinityfreeapp.com

## Phase 1: Login & Setup
- [ ] Login to https://dash.infinityfree.net/
- [ ] Find account: `saurabh-php-auth.infinityfreeapp.com`
- [ ] Open control panel

## Phase 2: Upload Files
- [ ] Open File Manager
- [ ] Go to `htdocs` folder
- [ ] Delete default files (index2.html)
- [ ] Upload these 8 files:
  - [ ] `index.php`
  - [ ] `login.php`
  - [ ] `register.php`
  - [ ] `dashboard.php`
  - [ ] `logout.php`
  - [ ] `config.php`
  - [ ] `styles.css`
  - [ ] `database.sql`

## Phase 3: Database Setup
- [ ] Go to "MySQL Databases"
- [ ] Click "Create Database"
- [ ] Name it: `userauth`
- [ ] **WRITE DOWN** these details:
  - [ ] Database Host: `sql___.infinityfree.com`
  - [ ] Database Name: `if0_____userauth`
  - [ ] Username: `if0_____`
  - [ ] Password: `____________`

## Phase 4: Import Database
- [ ] Open phpMyAdmin
- [ ] Login with database credentials
- [ ] Select your database
- [ ] Click "Import" tab
- [ ] Upload `database.sql`
- [ ] Click "Go"
- [ ] Wait for success message

## Phase 5: Configure Database Connection
- [ ] Go back to File Manager
- [ ] Edit `config.php`
- [ ] Replace database details:
  ```php
  define('DB_HOST', 'YOUR_HOST_HERE');
  define('DB_NAME', 'YOUR_DB_NAME_HERE');
  define('DB_USER', 'YOUR_USERNAME_HERE');
  define('DB_PASS', 'YOUR_PASSWORD_HERE');
  ```
- [ ] Save file

## Phase 6: Test Everything
- [ ] Visit: https://saurabh-php-auth.infinityfreeapp.com
- [ ] Homepage loads properly
- [ ] Registration form works
- [ ] Login system works
- [ ] Dashboard shows user info
- [ ] Logout works
- [ ] Styling looks good

## 🎉 Success!
- [ ] Take screenshot of working site
- [ ] Update resume with live demo link
- [ ] Share on LinkedIn
- [ ] Add to portfolio

---

## 🆘 Emergency Help

**Database connection errors?**
- Check config.php has correct credentials
- Verify database was created and imported

**Files not showing?**
- All files uploaded to `htdocs` folder?
- File names spelled correctly?

**No styling?**
- `styles.css` uploaded?
- Files in same directory?

**Still stuck?**
- Take screenshots of error messages
- Check InfinityFree knowledge base
- Ask for specific help with screenshots

---

**Estimated Time**: 10-15 minutes
**Difficulty**: Beginner-friendly
**Result**: Live portfolio project! 🚀
