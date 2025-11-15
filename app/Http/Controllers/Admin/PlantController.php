<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Plant::latest()->paginate(10);
        $categories = Category::all(); // Fetch all categories
        return view("admin.plants.index", compact("plants", "categories")); // Pass both plants and categories
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Assuming you have categories to select from
        $categories = \App\Models\Category::all();
        return view("admin.plants.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "price" => "required|numeric|min:0",
            "stock_quantity" => "required|integer|min:0",
            // Removed 'sku' validation
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048", // Max 2MB
            "difficulty_level" => "nullable|string|max:255",
            "light_requirements" => "nullable|string|max:255",
            "water_frequency" => "nullable|string|max:255",
            "size" => "nullable|string|max:255",
            "care_instructions" => "nullable|string",
            "is_featured" => "boolean",
            "is_active" => "boolean",
            "category_id" => "required|exists:categories,id",
        ]);

        $plant = new Plant();
        $plant->name = $validatedData["name"];
        $plant->slug = Str::slug($validatedData["name"]); // Generate slug from name
        $plant->description = $validatedData["description"] ?? null;
        $plant->price = $validatedData["price"];
        $plant->stock_quantity = $validatedData["stock_quantity"];
        // Removed 'sku' assignment
        $plant->difficulty_level = $validatedData["difficulty_level"] ?? null;
        $plant->light_requirements = $validatedData["light_requirements"] ?? null;
        $plant->water_frequency = $validatedData["water_frequency"] ?? null;
        $plant->size = $validatedData["size"] ?? null;
        $plant->care_instructions = $validatedData["care_instructions"] ?? null;
        $plant->is_featured = $validatedData["is_featured"] ?? false;
        $plant->is_active = $validatedData["is_active"] ?? true;
        $plant->category_id = $validatedData["category_id"];

        // Handle image upload
        if ($request->hasFile("image")) {
            $imagePath = $request->file("image")->store("plants", "public");
            // Store only the relative path (e.g., 'plants/imagename.jpg')
            $plant->image = $imagePath;
        }

        $plant->save();

        return redirect()->route("admin.plants.index")->with("success", "Plant created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        return view("admin.plants.show", compact("plant"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        $categories = \App\Models\Category::all();
        return view("admin.plants.edit", compact("plant", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "price" => "required|numeric|min:0",
            "stock_quantity" => "required|integer|min:0",
            // Removed 'sku' validation
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "difficulty_level" => "nullable|string|max:255",
            "light_requirements" => "nullable|string|max:255",
            "water_frequency" => "nullable|string|max:255",
            "size" => "nullable|string|max:255",
            "care_instructions" => "nullable|string",
            "is_featured" => "boolean",
            "is_active" => "boolean",
            "category_id" => "required|exists:categories,id",
        ]);

        $plant->name = $validatedData["name"];
        $plant->slug = Str::slug($validatedData["name"]);
        $plant->description = $validatedData["description"] ?? null;
        $plant->price = $validatedData["price"];
        $plant->stock_quantity = $validatedData["stock_quantity"];
        // Removed 'sku' assignment
        $plant->difficulty_level = $validatedData["difficulty_level"] ?? null;
        $plant->light_requirements = $validatedData["light_requirements"] ?? null;
        $plant->water_frequency = $validatedData["water_frequency"] ?? null;
        $plant->size = $validatedData["size"] ?? null;
        $plant->care_instructions = $validatedData["care_instructions"] ?? null;
        $plant->is_featured = $validatedData["is_featured"] ?? false;
        $plant->is_active = $validatedData["is_active"] ?? true;
        $plant->category_id = $validatedData["category_id"];

        // Handle image update
        if ($request->hasFile("image")) {
            // Delete old image if it exists
            if ($plant->image) {
                Storage::disk("public")->delete($plant->image);
            }
            $imagePath = $request->file("image")->store("plants", "public");
            $plant->image = $imagePath;
        }

        $plant->save();

        return redirect()->route("admin.plants.index")->with("success", "Plant updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        // Delete image if it exists
        if ($plant->image) {
            Storage::disk("public")->delete($plant->image);
        }
        $plant->delete();

        return redirect()->route("admin.plants.index")->with("success", "Plant deleted successfully!");
    }
}




