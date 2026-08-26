# Nusa Garuda Studio - Public REST API Documentation

This document contains standard `curl` examples and response specifications for the Nusa Garuda Studio public-facing REST API.

---

## Base URL

```
http://localhost:8000/api
```

---

## Response Format Specifications

### Success Response (HTTP 200 / 201)
```json
{
  "success": true,
  "message": "Data retrieved successfully",
  "data": [ ... ]
}
```

### Validation Failure Response (HTTP 422)
```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "email": [
      "The email field must be a valid email address."
    ]
  }
}
```

### Resource Not Found Response (HTTP 404)
```json
{
  "success": false,
  "message": "Resource not found",
  "data": null
}
```

---

## Endpoints Overview & cURL Examples

### 1. Get All Projects (List View)
Retrieves a list of projects. Excludes `detail_description`.

- **Method**: `GET`
- **Path**: `/api/projects`
- **Query Parameters**:
  - `category` *(optional)*: e.g. `Roblox Development`, `Website Development`
  - `featured` *(optional)*: `1` or `0`
  - `limit` *(optional)*: Clamped to maximum 50 records.

```bash
curl -X GET "http://localhost:8000/api/projects?featured=1&limit=6" \
  -H "Accept: application/json"
```

---

### 2. Get Single Project Details
Retrieves full project details including `detail_description` resolved by `slug`.

- **Method**: `GET`
- **Path**: `/api/projects/{slug}`

```bash
curl -X GET "http://localhost:8000/api/projects/garuda-world-rp" \
  -H "Accept: application/json"
```

---

### 3. Get Testimonials
Retrieves all published testimonials (`is_published = true`).

- **Method**: `GET`
- **Path**: `/api/testimonials`

```bash
curl -X GET "http://localhost:8000/api/testimonials" \
  -H "Accept: application/json"
```

---

### 4. Get FAQs
Retrieves active FAQs (`is_active = true`) sorted by `sort_order` ascending.

- **Method**: `GET`
- **Path**: `/api/faqs`
- **Query Parameters**:
  - `category` *(optional)*: `general`, `commercial`, `maintenance`, `technology`

```bash
curl -X GET "http://localhost:8000/api/faqs?category=general" \
  -H "Accept: application/json"
```

---

### 5. Get Team Members
Retrieves team members sorted by `sort_order` ascending.

- **Method**: `GET`
- **Path**: `/api/teams`

```bash
curl -X GET "http://localhost:8000/api/teams" \
  -H "Accept: application/json"
```

---

### 6. Get Gallery Items
Retrieves gallery items.

- **Method**: `GET`
- **Path**: `/api/gallery`
- **Query Parameters**:
  - `category` *(optional)*: `product` or `photo`

```bash
curl -X GET "http://localhost:8000/api/gallery?category=product" \
  -H "Accept: application/json"
```

---

### 7. Submit Contact Inquiry
Submits a contact inquiry. Rate limited to 10 requests per minute.

- **Method**: `POST`
- **Path**: `/api/inquiries`

```bash
curl -X POST "http://localhost:8000/api/inquiries" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "Budi Pratama",
    "email": "budi@example.com",
    "subject": "Custom Roblox Game Scripting",
    "message": "Hi Nusa Garuda Studio team! We would like to inquire about developing custom Luau game scripts for our upcoming Roblox project."
  }'
```

---

### 8. Submit Quotation Request
Submits a project quote request. Rate limited to 10 requests per minute.

- **Method**: `POST`
- **Path**: `/api/quotes`

```bash
curl -X POST "http://localhost:8000/api/quotes" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "Siti Rahma",
    "email": "siti@edunusa.id",
    "company": "PT EduNusa Indonesia",
    "organization_size": "medium",
    "goals_challenges": "We need a scalable CBT online exam platform capable of serving 5000 concurrent students with anti-cheat screen locks."
  }'
```

---

### 9. Get Active Brands / Partners
Retrieves active brand logos (`is_active = true`) sorted by `sort_order` ascending.

- **Method**: `GET`
- **Path**: `/api/brands`

```bash
curl -X GET "http://localhost:8000/api/brands" \
  -H "Accept: application/json"
```

---

### 10. Get Published Blog Posts
Retrieves published blog posts (`is_published = true`) sorted by `published_at` descending. Supports category filtering and pagination.

- **Method**: `GET`
- **Path**: `/api/posts`
- **Query Parameters**:
  - `category` *(optional)*: Filter by category slug, e.g. `roblox-development`, `web-engineering`, `studio-news`
  - `page` *(optional)*: Page number for pagination.
  - `per_page` *(optional)*: Items per page (default: 15, max: 50).

```bash
curl -X GET "http://localhost:8000/api/posts?category=roblox-development" \
  -H "Accept: application/json"
```

---

### 11. Get Single Blog Post Detail
Retrieves full detail of a blog post by `slug`.

- **Method**: `GET`
- **Path**: `/api/posts/{slug}`

```bash
curl -X GET "http://localhost:8000/api/posts/building-scalable-roleplay-ecosystems-roblox-2026" \
  -H "Accept: application/json"
```

