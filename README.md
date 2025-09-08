# Work Management System

A comprehensive work management system built with Laravel and Filament PHP, designed to streamline work scheduling, team management, and payroll processing with an integrated withdrawal system.

## 🚀 Features

### 👥 User & Role Management
- **Admin**: Full system access and management capabilities
- **Leader**: Team leadership and work schedule creation
- **Worker**: Task execution and salary withdrawal requests

### 📋 Work Management
- **Work Types**: Categorize jobs with units and pricing
- **Work Schedules**: Manage work assignments with status tracking (pending, in_progress, completed, cancelled)
- **Work Details**: Track individual worker contributions and tasks

### 💰 Integrated Payroll System
- **Worker Dashboard**: Real-time earnings overview and balance tracking
- **Withdrawal Requests**: Workers can submit salary withdrawal requests
- **Admin Approval**: Streamlined approval workflow with status management
- **Transfer Proof**: Secure document upload for transaction verification
- **Notification System**: Real-time updates for withdrawal status changes

## 🛠️ Technology Stack

- **Laravel 10.x**
- **Filament PHP 3.x**
- **Livewire**
- **MySQL**
- **Filament Shield** (Role-based access control)
- **Spatie Laravel Permission**

## 📦 Installation

### 1. Clone Repository
```bash
git clone <repository-url>
cd work-management-system
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration
Update `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=work_management
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Database Migration & Seeding
```bash
php artisan migrate
php artisan db:seed
```

### 6. Install Filament Shield
```bash
php artisan shield:install --fresh
```

### 7. Generate Permissions
```bash
php artisan shield:generate
```

### 8. Start Development Server
```bash
php artisan serve
```

Access the application at: `http://localhost:8000/admin`

## 👤 Default Login Credentials

### Administrator
- **Email**: admin@example.com
- **Password**: password

### Team Leader
- **Email**: leader@example.com
- **Password**: password

### Worker
- **Email**: worker@example.com
- **Password**: password

## 📊 Database Structure

### Core Tables
- `users` - User accounts with role management
- `work_types` - Job categories (name, unit, price, description)
- `work_schedules` - Work assignments (status, quantity, leader, work_type)
- `work_details` - Task specifics (worker, job description)
- `withdrawals` - Salary withdrawal records (status, amount, transfer proof)

### Relationships
- WorkSchedule → WorkType (belongsTo)
- WorkSchedule → User/Leader (belongsTo)
- WorkDetail → WorkSchedule (belongsTo)
- WorkDetail → User/Worker (belongsTo)
- Withdrawal → User/Worker (belongsTo)

## 🎯 User Guide

### 1. Configure Work Types
1. Log in as administrator
2. Navigate to **Work Types** section
3. Add job categories with appropriate units and pricing

### 2. Create Work Schedule
1. Log in as team leader
2. Access **Work Schedules** menu
3. Create new work schedule with selected work type
4. Set quantity and initial status

### 3. Assign Workers
1. Open Work Schedule details
2. Navigate to **Workers List** tab
3. Add workers with job descriptions
4. System automatically calculates individual earnings

### 4. Salary Withdrawal (Worker)
1. Log in as worker
2. Check dashboard for earnings overview
3. Click **Request Withdrawal** if balance available
4. Specify amount and optional notes

### 5. Withdrawal Approval (Admin)
1. Log in as administrator
2. Access **Withdrawals** management
3. Review pending withdrawal requests
4. Approve/Reject with appropriate reasons
5. Upload transfer proof when approved

## 🔐 Role-Based Access Control

### Administrator
- Full system access privileges
- Manage work types, schedules, and withdrawals
- Process salary withdrawal approvals

### Team Leader
- Create and manage work schedules
- Assign workers to specific tasks
- Monitor work progress and completion

### Worker
- View assigned tasks and responsibilities
- Access earnings dashboard and history
- Submit withdrawal requests
- Track request status and history

## 📝 Notification System

### Administrator Notifications
- New withdrawal request alerts
- Pending approval reminders

### Worker Notifications
- Withdrawal status updates (approved/rejected)
- Transfer proof upload notifications

## 🚀 Production Deployment

### 1. Environment Configuration
Ensure production settings in `.env`:
```env
APP_ENV=production
APP_DEBUG=false
```

### 2. Application Optimization
```bash
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. Queue Worker Setup
```bash
# For processing notifications and background tasks
php artisan queue:work
```

### 4. Storage Configuration
```bash
php artisan storage:link
```

## 🐛 Troubleshooting

### Common Issues
1. **Storage permissions**
   ```bash
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```

2. **Class loading issues**
   ```bash
   composer dump-autoload
   ```

3. **Migration problems**
   ```bash
   php artisan migrate:fresh
   ```

### Log Files
Check detailed errors in `storage/logs/laravel.log`

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

## 📄 License

This project is licensed under the [MIT License](LICENSE).

## 🆓 Support

For questions and support:
- Email: support@example.com
- Issues: [GitHub Issues](https://github.com/your-repo/issues)

---

**Security Note**: Remember to change default credentials before production deployment.

---
**Author**: Razenry
