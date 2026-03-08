### Documentation Generator Prompt

**Objective:**
Transform the provided raw content into polished, professionally formatted HTML for technical documentation.

**Rules & Formatting:**

1.  **Content Refinement:** Polish the raw text for clarity, professional tone, and grammatical precision. 
2.  **Structural Hierarchy:** Organize the output using `<h3>` tags for all section headings.
3.  **Character Escaping:** To ensure proper rendering, you MUST escape the following four symbols throughout the text and code snippets:
    * `<` becomes `&lt;`
    * `>` becomes `&gt;`
    * `{` becomes `&#123;`
    * `}` becomes `&#125;`
4.  **Code Block Standard:** All PHP code snippets must be wrapped in the following custom container:

<div class="code-card"> 
    <button class="copy-btn" title="copy"><i class="bi bi-copy"></i></button> 
    <pre><code class="language-php"> 
// code goes here !
    </code></pre>
</div>

---

**Content to Process:**
[INSERT CONTENT HERE]
